<?php
require_once("dompdf/autoload.inc.php"); // adjust if needed
use Dompdf\Dompdf;
use Dompdf\Options;

// Get posted JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Fallback dummy data if nothing is posted
if (!$data) {
    $data = [
        "section"        => "Aggregate Section",
        "sub_section"    => "Crushing",
        "test"           => "Sieve Analysis",
        "test_no"        => "12345",
        "performer_name" => "John Doe",
        "comment"        => "Sample test data"
    ];
}

// 🔹 Convert logo to Base64
$logoPath = __DIR__ . "/../assets/img/logo_cnw.png";
$base64Logo = "";
if (file_exists($logoPath)) {
    $type = pathinfo($logoPath, PATHINFO_EXTENSION);
    $dataLogo = file_get_contents($logoPath);
    $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($dataLogo);
}

// Dompdf options
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Build HTML for PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }
        header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        header img {
            max-height: 60px;
            margin-bottom: 5px;
        }
        header h2 {
            margin: 0;
            font-size: 18px;
            color: #2a2a2a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th, table td {
            border: 1px solid #999;
            padding: 8px 10px;
            text-align: left;
        }
        table th {
            background: #f2f2f2;
        }
        footer {
            position: fixed; 
            bottom: -10px; 
            left: 0px; 
            right: 0px;
            height: 30px; 
            text-align: center;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>
<body>

<header>
    '.($base64Logo ? '<img src="'.$base64Logo.'" alt="Logo">' : '<h2>Material Testing Report</h2>').'
    <h2>Material Testing Report</h2>
</header>

<h3>Test Details</h3>
<table>
    <tr>
        <th>Section</th>
        <td>' . htmlspecialchars($data["section"]) . '</td>
    </tr>
    <tr>
        <th>Sub Section</th>
        <td>' . htmlspecialchars($data["sub_section"]) . '</td>
    </tr>
    <tr>
        <th>Test</th>
        <td>' . htmlspecialchars($data["test"]) . '</td>
    </tr>
    <tr>
        <th>Test Number</th>
        <td>' . htmlspecialchars($data["test_no"]) . '</td>
    </tr>
    <tr>
        <th>Performer Name</th>
        <td>' . htmlspecialchars($data["performer_name"]) . '</td>
    </tr>
    <tr>
        <th>Comments</th>
        <td>' . htmlspecialchars($data["comment"]) . '</td>
    </tr>
</table>

<footer>
    Page {PAGE_NUM} of {PAGE_COUNT}
</footer>

</body>
</html>
';

// Load HTML into Dompdf
$dompdf->loadHtml($html);

// A4 portrait
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Add footer page numbers (optional, already in footer as {PAGE_NUM})
$canvas = $dompdf->getCanvas();
$font = $dompdf->getFontMetrics()->get_font("helvetica", "normal");
$canvas->page_text(270, 820, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 9, [0,0,0]);

// Output PDF
header("Content-Type: application/pdf");
echo $dompdf->output();
