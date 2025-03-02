<?php
class Login extends CI_Model {

    /**
     * Authenticate user by email/username and password
     * 
     * @param string $username
     * @param string $password
     * @return object|bool Returns user object if valid credentials, otherwise false
     */
    public function getLogin($username, $password) {
        $sql = "SELECT id_cliente, nombre_usuario, email, estado 
                FROM clientes 
                WHERE (nombre_usuario = ? OR email = ?) 
                AND Contraseña = ? 
                AND estado = 1 
                LIMIT 1";

        // Use query binding to avoid SQL injection
        $query = $this->db->query($sql, [$username, $username, $password]);

        if ($query->num_rows() === 1) {
            return $query->row(); // Return the first matched record
        }

        return false; // No matching user found
    }
}
