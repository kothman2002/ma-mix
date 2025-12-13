<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

/* ===========================
    STATISTICS (MAIN COUNTERS)
   =========================== */

// Total visitors
$totalVisitors = $conn->query("SELECT COUNT(*) AS c FROM visits")->fetch_assoc()['c'];

// Today visitors
$todayVisitors = $conn->query("
    SELECT COUNT(*) AS c 
    FROM visits 
    WHERE DATE(visited_at)=CURDATE()
")->fetch_assoc()['c'];

// This month visitors
$monthVisitors = $conn->query("
    SELECT COUNT(*) AS c 
    FROM visits 
    WHERE MONTH(visited_at)=MONTH(CURDATE()) 
    AND YEAR(visited_at)=YEAR(CURDATE())
")->fetch_assoc()['c'];

// Total messages
$totalMessages = $conn->query("SELECT COUNT(*) AS c FROM messages")->fetch_assoc()['c'];

// Today messages
$todayMessages = $conn->query("
    SELECT COUNT(*) AS c 
    FROM messages 
    WHERE DATE(created_at)=CURDATE()
")->fetch_assoc()['c'];

// This month messages
$monthMessages = $conn->query("
    SELECT COUNT(*) AS c 
    FROM messages 
    WHERE MONTH(created_at)=MONTH(CURDATE()) 
    AND YEAR(created_at)=YEAR(CURDATE())
")->fetch_assoc()['c'];


/* ===========================
      LAST 7 DAYS STATISTICS
   =========================== */
$visitors7 = [];
$messages7 = [];
$daysLabels = [];

for ($i = 6; $i >= 0; $i--) {
    $day = date("Y-m-d", strtotime("-$i days"));
    $daysLabels[] = $day;

    // visitors
    $q1 = $conn->query("SELECT COUNT(*) AS c FROM visits WHERE DATE(visited_at)='$day'");
    $visitors7[] = $q1->fetch_assoc()['c'];

    // messages
    $q2 = $conn->query("SELECT COUNT(*) AS c FROM messages WHERE DATE(created_at)='$day'");
    $messages7[] = $q2->fetch_assoc()['c'];
}

// include layout
include "layout.php";
?>

<style>
.stat-card {
    background: #111827;
    border: 1px solid #1f2937;
    border-radius: 12px;
    padding: 22px;
    text-align: center;
    transition: 0.3s;
}
.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 18px rgba(0,0,0,0.5);
}
.stat-label {
    color: #93c5fd;
    font-size: 0.9rem;
    margin-bottom: 5px;
}
.stat-value {
    color: #fff;
    font-size: 2rem;
    font-weight: bold;
}
</style>

<h2 class="mb-4 text-primary">Dashboard Statistics</h2>

<!-- COUNTERS -->
<div class="row g-4">

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">Total Visitors</div>
            <div class="stat-value" data-target="<?php echo $totalVisitors; ?>">0</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">Today's Visitors</div>
            <div class="stat-value" data-target="<?php echo $todayVisitors; ?>">0</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">This Month Visitors</div>
            <div class="stat-value" data-target="<?php echo $monthVisitors; ?>">0</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">Total Messages</div>
            <div class="stat-value" data-target="<?php echo $totalMessages; ?>">0</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">Today's Messages</div>
            <div class="stat-value" data-target="<?php echo $todayMessages; ?>">0</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label">This Month Messages</div>
            <div class="stat-value" data-target="<?php echo $monthMessages; ?>">0</div>
        </div>
    </div>

</div>

<!-- CHARTS SECTION -->
<div class="mt-5">

    <h3 class="text-primary mb-4">Visitors & Messages Overview</h3>

    <div class="row g-4">

        <!-- Visitors Chart -->
        <div class="col-md-6">
            <div class="card p-3" style="background:#111827; border:1px solid #1e293b;">
                <h5 class="text-primary text-center">Visitors (Last 7 Days)</h5>
                <canvas id="visitorsChart" height="180"></canvas>
            </div>
        </div>

        <!-- Messages Chart -->
        <div class="col-md-6">
            <div class="card p-3" style="background:#111827; border:1px solid #1e293b;">
                <h5 class="text-primary text-center">Messages (Last 7 Days)</h5>
                <canvas id="messagesChart" height="180"></canvas>
            </div>
        </div>

    </div>
</div>


<!-- JS LIBRARIES -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// === Animated Counters ===
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".stat-value");

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const current = +counter.innerText;

            const increment = target / 40;

            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});

// === CHART DATA FROM PHP ===
const labels = <?php echo json_encode($daysLabels); ?>;
const visitorsData = <?php echo json_encode($visitors7); ?>;
const messagesData = <?php echo json_encode($messages7); ?>;

// === Visitors Chart ===
new Chart(document.getElementById("visitorsChart"), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Visitors',
            data: visitorsData,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            borderWidth: 2,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false }},
        scales: {
            x: { ticks: { color: '#fff' }},
            y: { ticks: { color: '#fff' }}
        }
    }
});

// === Messages Chart ===
new Chart(document.getElementById("messagesChart"), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Messages',
            data: messagesData,
            backgroundColor: '#1e40af',
            borderColor: '#3b82f6',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false }},
        scales: {
            x: { ticks: { color: '#fff' }},
            y: { ticks: { color: '#fff' }}
        }
    }
});
</script>

</body>
</html>
