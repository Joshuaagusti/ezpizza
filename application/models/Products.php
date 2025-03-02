<?php
class Products extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getproducts() {
        $sql = "SELECT * FROM productos ORDER BY id_producto;

";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getproductsbyid($id) {
        $sql = "SELECT * FROM vista_productos WHERE id_producto = $id;

";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getimagesbyid($id) {
        $sql = "SELECT 
    url_imagen,is_cover
FROM 
    imagenes 
WHERE 
    id_producto = $id;


";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function reviewPercentages($id) {
        $sql = "WITH star_ratings AS (
    SELECT 1 AS rating
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
)
SELECT 
    star_ratings.rating,
    COALESCE(review_counts.review_count, 0) AS review_count,
    COALESCE(review_counts.percentage, 0) AS percentage
FROM star_ratings
LEFT JOIN (
    SELECT 
        calificacion AS rating,
        COUNT(*) AS review_count,
        ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM testimonios WHERE id_producto = $id), 0) AS percentage
    FROM testimonios
    WHERE id_producto = $id
    GROUP BY calificacion
) AS review_counts ON star_ratings.rating = review_counts.rating
ORDER BY star_ratings.rating DESC


";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function get_category_tree() {
        $query = $this->db->query("
            SELECT id_categoria, nombre_categoria, id_categoria_padre 
            FROM categorias
            ORDER BY id_categoria_padre, id_categoria
        ");

        $categories = $query->result_array();
        $tree = [];

        foreach ($categories as $category) {
            if (empty($category['id_categoria_padre'])) {
                $tree[$category['id_categoria']] = [
                    'name' => $category['nombre_categoria'],
                    'children' => []
                ];
            } else {
                $tree[$category['id_categoria_padre']]['children'][] = [
                    'id' => $category['id_categoria'],
                    'name' => $category['nombre_categoria']
                ];
            }
        }
        return $tree;
    }
    
    public function insertProduct($data) {
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }

    public function insertProductImage($image_data) {
        $this->db->insert('imagenes', $image_data);
        return $this->db->insert_id();
    }
    public function deleteProduct($id) {
        $this->db->where('id_producto', $id);
        $this->db->delete('productos');
    }

    public function getReviewsById($id){

        $sql = "SELECT 
    t.id_testimonio,
    c.usuario,
    t.comentario,
    t.calificacion,
    t.fecha_testimonio,
    t.id_producto,
    c.foto_perfil
FROM 
    testimonios t
JOIN 
    clientes c ON t.id_cliente = c.id_cliente
WHERE 
    t.id_producto = $id
ORDER BY 
   t.fecha_testimonio DESC


        ";
                $query = $this->db->query($sql);
                return $query->result();



    }
    
    public function get_filtered_products($min_price = null, $max_price = null, $category_id = null, $state = 1, $rating_min = null, $limit = 40, $offset = 0,$query = null) {
        // Base query
        $this->db->select('
            p.id_producto, 
            p.nombre, 
            p.descripcion, 
            p.precio, 
            p.stock, 
            v.url_imagen, 
            v.id_categoria_hija, 
            v.categoria_hija, 
            v.id_categoria_padre, 
            v.categoria_padre, 
            COALESCE(CAST(AVG(t.calificacion) AS DECIMAL(10,1)), 0) AS promedio_calificacion,  -- Handling null ratings
            COUNT(t.id_testimonio) AS numero_testimonios
        ');
    
        $this->db->from('productos p');
        $this->db->join('categorias c', 'p.id_categoria = c.id_categoria', 'left');
        $this->db->join('testimonios t', 'p.id_producto = t.id_producto', 'left');
        $this->db->join('vista_productos v', 'p.id_producto = v.id_producto', 'left');
        if ($query !== null) {
            // Use group_start() and group_end() to create a nested condition
    
            $this->db->group_start();
            // Search in both product name and description
            $this->db->like('p.nombre', $query);
            $this->db->or_like('p.descripcion', $query);
            $this->db->group_end();
           
        }
        // Apply price filters if both are provided
        if ($min_price !== null) {
            $this->db->where('p.precio >=', $min_price);
        }
        if ($max_price !== null) {
            $this->db->where('p.precio <=', $max_price);
        }
    
        // Apply category filter if provided
        if ($category_id !== null) {
            $this->db->where('p.id_categoria', $category_id);
        }
    
        // Apply state filter (default to 1 if not provided)
        $this->db->where('p.estado', $state);
    
        // Apply minimum rating filter if provided
        if ($rating_min !== null) {
            $this->db->having('promedio_calificacion >=', $rating_min);
        }
        
        // Group by product id to aggregate ratings and testimonials
        $this->db->group_by('p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, v.url_imagen, v.id_categoria_hija, v.categoria_hija, v.id_categoria_padre, v.categoria_padre');
        
        // Apply ordering by price
        $this->db->order_by('p.precio', 'ASC');
    
        // Apply pagination (limit and offset)
        $this->db->limit($limit, $offset);
    
        // Execute the query
        $query = $this->db->get();
    
        // Return the result
        return $query->result();
    }
    
    public function search_products($query) {
        $this->db->select('id_producto, nombre, url_imagen,categoria_padre');
        $this->db->from('vista_productos');
        $this->db->like('nombre', $query);
        $this->db->limit(10); // Limit the number of results
        return $this->db->get()->result_array();
    }
    
    
    
}