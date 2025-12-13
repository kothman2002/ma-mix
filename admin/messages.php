<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

// البحث
$search = "";
$sql = "SELECT * FROM messages ORDER BY id DESC";

if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM messages 
            WHERE name LIKE '%$search%' 
            OR email LIKE '%$search%' 
            OR phone LIKE '%$search%' 
            OR message LIKE '%$search%'
            ORDER BY id DESC";
}

$result = $conn->query($sql);

// layout
include "layout.php";
?>

<style>
/* صندوق المسجات */
.table-container {
    background: #0f172a;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #1e293b;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

/* بحث */
.search-box {
    max-width: 420px;
}

/* جدول غامق */
.dark-box th {
    background: #1e293b !important;
    color: #ffffff !important;
    border-color: #334155 !important;
}

.dark-box td {
    background: #0f172a !important;
    color: #ffffff !important;
    border-color: #1e293b !important;
}

.dark-box tr:hover td {
    background: #1e2538 !important;
}

/* زر عرض */
.btn-view {
    background: #0ea5e9;
    color: #fff;
    width: 42px;
    height: 38px;
    padding: 0;
    border-radius: 8px;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btn-view:hover {
    background: #0284c7;
}

/* زر حذف */
.btn-delete {
    background: #ef4444;
    color: #fff;
    width: 42px;
    height: 38px;
    padding: 0;
    border-radius: 8px;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btn-delete:hover {
    background: #dc2626;
}
</style>

<h2 class="mb-4 text-primary">Messages</h2>

<!-- Search -->
<form method="GET" class="d-flex mb-4 search-box">

    <input type="text" 
           name="search" 
           class="form-control" 
           placeholder="Search..."
           value="<?php echo $search; ?>"
           style="border-radius: 8px 0 0 8px;">

    <button class="btn btn-primary"
            style="border-radius: 0 8px 8px 0; padding-inline:22px;">
        Search
    </button>

</form>

<!-- TABLE -->
<div class="table-container">

    <table class="table text-center dark-box">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= mb_strimwidth(htmlspecialchars($row['message']), 0, 25, "..."); ?></td>
                    <td><?= $row['created_at']; ?></td>

                    <td>
                        <a href="message-view.php?id=<?= $row['id']; ?>" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a href="delete.php?id=<?= $row['id']; ?>" 
                           class="btn-delete"
                           onclick="return confirm('Are you sure you want to delete this message?');">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

</body>
</html>
