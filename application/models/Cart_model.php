<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Application/models/Cart_model.php
class Cart_model extends CI_Model {

  // Method to insert a new item into the cart
  

  // Method to get all items in the cart for a specific client
  public function get_cart($id_cliente) {
    $this->db->select('
     c.id_carrito, 
    c.id_producto, 
    p.nombre AS producto_nombre, 
    c.cantidad, 
    p.precio, 
    (c.cantidad * p.precio) AS subtotal,
    p.url_imagen,
    p.`stock`
    ');
    $this->db->from('carrito c');
    $this->db->join('vista_productos p', 'c.id_producto = p.id_producto');
    $this->db->where('c.id_cliente', $id_cliente);
    



    $query = $this->db->get();

    // Return the result as an array
    return $query->result_array();
  }
  public function insert_cart($id_cliente, $id_producto, $cantidad) {
    // Check if the product already exists in the cart for this user
    $this->db->where('id_cliente', $id_cliente);
    $this->db->where('id_producto', $id_producto);
    $query = $this->db->get('carrito');

    if ($query->num_rows() > 0) {
        // Product already exists in the cart, so just update the quantity
        $this->db->set('cantidad', 'cantidad + ' . (int)$cantidad, FALSE);
        $this->db->where('id_cliente', $id_cliente);
        $this->db->where('id_producto', $id_producto);
        return $this->db->update('carrito');
    } else {
        // Product does not exist, so insert it into the cart
        $data = [
            'id_cliente' => $id_cliente,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ];
        return $this->db->insert('carrito', $data);
    }
}
public function update_cart_item_quantity($id_carrito, $id_producto, $cantidad, $id_cliente) {   
  try {       
      // Start transaction       
      $this->db->trans_start();       
      
      // Get product price       
      $producto = $this->db->select('precio')
                          ->from('productos')
                          ->where('id_producto', $id_producto)
                          ->get()
                          ->row();
      
      if (!$producto) {
          return [
              'success' => false,
              'message' => 'Product not found'
          ];
      }
      
      // Calculate new subtotal       
      $subtotal = $producto->precio * $cantidad;
      
      // Update cart item       
      $update_data = [
          'cantidad' => $cantidad,
          //'subtotal' => $subtotal
      ];
      
      $this->db->where('id_carrito', $id_carrito)
               ->where('id_producto', $id_producto)
               ->where('id_cliente', $id_cliente)  // Add customer ID filter
               ->update('vista_carrito_cliente', $update_data);
      
      // Complete transaction       
      $this->db->trans_complete();
      
      // Return success response       
      return [
          'success' => true,
          'precio' => number_format($producto->precio, 2),
          'cantidad' => $cantidad,
          'subtotal' => number_format($subtotal, 2)
      ];
  } catch (Exception $e) {
      return [
          'success' => false,
          'message' => $e->getMessage()
      ];
  } 
}

public function calculate_cart_summary($id_cliente) {
  try {
      // Calculate total from cart items for specific customer
      $cart_total = $this->db->select_sum('subtotal')
                             ->from('vista_carrito_cliente')
                             ->where('id_cliente', $id_cliente)  // Filter by customer ID
                             ->get()
                             ->row()
                             ->subtotal;
      
      // Shipping calculation (example: free shipping over $50)       
      $shipping = ($cart_total >= 50) ? 0 : 10;
      
      // Final total including shipping       
      $final_total = $cart_total + $shipping;
      
      return [
          'subtotal' => round($cart_total, 2),
          'shipping' => round($shipping, 2),
          'total' => round($final_total, 2)
      ];
  } catch (Exception $e) {
      return [
          'error' => $e->getMessage()
      ];
  }
}
public function delete_cart_item($id_carrito, $id_cliente) {
  $this->db->where('id_carrito', $id_carrito);
  $this->db->where('id_cliente', $id_cliente);
  return $this->db->delete('carrito'); // Assuming your table is named `carrito`
}
public function createOrder($id_cliente) {
    // Start a database transaction
    $this->db->trans_start();

    // Get cart items for the client
    $cart_items = $this->get_cart($id_cliente);

    if (empty($cart_items)) {
        $this->db->trans_complete();
        return false; // No items in the cart
    }

    // Calculate total from cart items
    $total = array_sum(array_column($cart_items, 'subtotal'));

    // Insert into ordenes
    $order_data = [
        'id_cliente' => $id_cliente,
        'total' => $total,
        'estado' => 'preparation',
        'info_adicional' => 'Order created successfully.'
    ];
    $this->db->insert('ordenes', $order_data);
    $order_id = $this->db->insert_id();

    // Insert order items
    foreach ($cart_items as $item) {
        $order_item_data = [
            'id_orden' => $order_id,
            'id_producto' => $item['id_producto'],
            'cantidad' => $item['cantidad'],
            'precio_unitario' => $item['precio']
        ];
        $this->db->insert('order_items', $order_item_data);

        // Optional: Update product stock
        $this->db->set('stock', 'stock - ' . $item['cantidad'], FALSE);
        $this->db->where('id_producto', $item['id_producto']);
        $this->db->update('productos');
    }

    // Clear carrito for the client
    $this->db->where('id_cliente', $id_cliente);
    $this->db->delete('carrito');

    // Complete the transaction
    $this->db->trans_complete();

    return $this->db->trans_status() ? $order_id : false;
    
}
public function getOrdersByClient($cliente_id) {
    $this->db->where('ClienteID', $cliente_id);
    $this->db->order_by('FechaOrden', 'DESC');  // Orders by 'FechaOrden' in descending order (newest first)
    $query = $this->db->get('vista_ordenes_detalle');
    return $query->result_array(); // Returns the result as an array
    
}


}
