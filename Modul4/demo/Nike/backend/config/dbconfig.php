<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "web_modul4";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan ID dari URL jika ada
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Cek jenis request
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if ($id) {
            // Mengambil satu item berdasarkan ID
            $sql = "SELECT id, item_name, deskripsi, harga, img_item FROM items WHERE id = $id";
        } else {
            // Mengambil semua item jika ID tidak diberikan
            $sql = "SELECT id, item_name, deskripsi, harga, img_item FROM items";
        }
        
        $result = $conn->query($sql);
        $items = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['img_item'] = '/Modul4/demo/Nike/frontend/image/' . $row['img_item'];
                $items[] = $row;
            }
            echo json_encode($items);
        } else {
            echo json_encode([]);
        }
        break;

    case 'POST':
        // Menambahkan item baru
        $data = json_decode(file_get_contents('php://input'), true);
        $item_name = $data['item_name'];
        $deskripsi = $data['deskripsi'];
        $harga = $data['harga'];
        $img_item = $data['img_item'];

        $sql = "INSERT INTO items (item_name, deskripsi, harga, img_item) 
                VALUES ('$item_name', '$deskripsi', '$harga', '$img_item')";
        
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Item added successfully']);
        } else {
            echo json_encode(['message' => 'Error adding item: ' . $conn->error]);
        }
        break;

    case 'PUT':
        // Mengupdate item berdasarkan ID
        if ($id) {
            $data = json_decode(file_get_contents('php://input'), true);
            $item_name = $data['item_name'];
            $deskripsi = $data['deskripsi'];
            $harga = $data['harga'];
            $img_item = $data['img_item'];

            $sql = "UPDATE items SET item_name = '$item_name', deskripsi = '$deskripsi', harga = '$harga', img_item = '$img_item' WHERE id = $id";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['message' => 'Item updated successfully']);
            } else {
                echo json_encode(['message' => 'Error updating item: ' . $conn->error]);
            }
        } else {
            echo json_encode(['message' => 'ID is required to update']);
        }
        break;

    case 'DELETE':
        // Menghapus item berdasarkan ID
        if ($id) {
            $sql = "DELETE FROM items WHERE id = $id";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['message' => 'Item deleted successfully']);
            } else {
                echo json_encode(['message' => 'Error deleting item: ' . $conn->error]);
            }
        } else {
            echo json_encode(['message' => 'ID is required to delete']);
        }
        break;

    default:
        echo json_encode(['message' => 'Request method not supported']);
        break;
}

$conn->close();

?>
