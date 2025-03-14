<?php
class WebAPI
{
    public function __construct()
    {
        global $__site_config;
        $__site_config_path = __DIR__ . '/../../workspace/config.json';
    
        // Check if config file exists
        if (!file_exists($__site_config_path)) {
            die("Error: Config file not found at " . $__site_config_path);
        }
    
        // Read and decode JSON config
        $__site_config = json_decode(file_get_contents($__site_config_path), true);
        if ($__site_config === null) {
            die("Error: Failed to parse config.json");
        }
    
    
        if (!extension_loaded('mongodb')) {
            die("Unable to load mongodb.so");
        }
    
        try {
            $this->mongoClient = new MongoDB\Client($__site_config['database_conn_string']);
    
            if (!$this->mongoClient) {
                http_response_code(500);
                die("Database server not running.");
            }
    
            DatabaseConnection::$client = $this->mongoClient;
    
        } catch (Exception $e) {
            die("MongoDB Connection Failed: " . $e->getMessage());
        }
    }
    
    public function initiateSession()
    {
        Session::start();
        if (Session::isset("session_token")) {
            try {
                Session::$usersession = UserSession::authorize(Session::get('session_token'));
            } catch (Exception $e) {
                // TODO: Handle error
                error_log("Session authorization failed: " . $e->getMessage());
            }
        }
    }
}   
