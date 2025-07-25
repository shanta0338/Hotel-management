<?php
// Test database connectivity
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=hotel', 'root', '');
    echo "✅ MySQL connection successful!\n";
    
    // Test if users table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "✅ Users table exists!\n";
    } else {
        echo "❌ Users table does not exist. You need to run migrations.\n";
    }
} catch (PDOException $e) {
    echo "❌ MySQL connection failed: " . $e->getMessage() . "\n";
    echo "Make sure:\n";
    echo "1. MySQL/XAMPP is running\n";
    echo "2. Database 'hotel' exists\n";
    echo "3. MySQL credentials are correct\n";
}
?>
