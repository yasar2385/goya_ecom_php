<?php
// crud_operations.php
ob_start();
require_once 'server/connect_db.php';
require_once 'server/logger.php';
ob_get_clean();
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    connect_db();
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['action'])) {
        switch ($input['action']) {
            case 'create':
                if (isset($input['name'], $input['description'], $input['price'], $input['category_id'])) {
                    try {
                        $stmt = $pdo->prepare("INSERT INTO `products` (`name`, `description`, `price`, `category_id`) VALUES (:name, :description, :price, :category_id)");
                        $stmt->bindParam(':name', $input['name']);
                        $stmt->bindParam(':description', $input['description']);
                        $stmt->bindParam(':price', $input['price']);
                        $stmt->bindParam(':category_id', $input['category_id']);
                        $stmt->execute();

                        echo json_encode(['success' => true, 'message' => 'Product added successfully.']);
                    } catch (PDOException $e) {
                        echo json_encode(['success' => false, 'message' => 'Failed to add product: ' . $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
                }
                break;

            case 'read':
                try {
                    $stmt = $pdo->prepare("SELECT * FROM `products`");
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo json_encode(['success' => true, 'data' => $products]);
                } catch (PDOException $e) {
                    echo json_encode(['success' => false, 'message' => 'Failed to fetch products: ' . $e->getMessage()]);
                }
                break;

            case 'update':
                if (isset($input['id'], $input['name'], $input['description'], $input['price'], $input['category_id'])) {
                    try {
                        $stmt = $pdo->prepare("UPDATE `products` SET `name` = :name, `description` = :description, `price` = :price, `category_id` = :category_id WHERE `id` = :id");
                        $stmt->bindParam(':id', $input['id']);
                        $stmt->bindParam(':name', $input['name']);
                        $stmt->bindParam(':description', $input['description']);
                        $stmt->bindParam(':price', $input['price']);
                        $stmt->bindParam(':category_id', $input['category_id']);
                        $stmt->execute();

                        echo json_encode(['success' => true, 'message' => 'Product updated successfully.']);
                    } catch (PDOException $e) {
                        echo json_encode(['success' => false, 'message' => 'Failed to update product: ' . $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
                }
                break;

            case 'delete':
                if (isset($input['id'])) {
                    try {
                        $stmt = $pdo->prepare("DELETE FROM `products` WHERE `id` = :id");
                        $stmt->bindParam(':id', $input['id']);
                        $stmt->execute();

                        echo json_encode(['success' => true, 'message' => 'Product deleted successfully.']);
                    } catch (PDOException $e) {
                        echo json_encode(['success' => false, 'message' => 'Failed to delete product: ' . $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Product ID is required.']);
                }
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action.']);
                break;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action is required.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
