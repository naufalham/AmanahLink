<html>
<head>
    <title>Footer Section</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
			border-radius: 20px;
        }
        .footer {
            background: linear-gradient(#F9DA73 0,1%, #0E6635 99%, #0E6635 200%);
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
			border-radius: 80px 80px 0 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .footer-content div {
            margin: 10px;
        }
        .footer-content h3 {
            margin-bottom: 10px;
			margin-top: 40px;
			font-family: 'Kantumruy', sans-serif;
            font-size: 14px;
            font-weight: bold;
			text-align: left;
        }
        .footer-content p, .footer-content a {
            margin: 5px 0;
            color: white;
            text-decoration: none;
			font-family: 'Kantumruy', sans-serif;
            font-size: 14px;
			text-align: left;
        }
        .footer-content a:hover {
            text-decoration: underline;
        }
        .footer-content i {
            margin-right: 5px;
        }
        .footer-bottom {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        @media (max-width: 600px) {
            .footer-content {
                flex-direction: column;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="footer">
        <div class="footer-content">
            <div>
                <h3>Alamat Kami</h3>
                <p><img src="assets/logo/lokasi.png" width="20" height="20"> Sedan, Sariharjo, Ngaglik, Sleman, DIY 55581</p>
            </div>
            <div>
                <h3>Kontak kami</h3>
                <p><img src="assets/logo/telepon.png" width="20" height="20"> +62 89668369180</p>
                <p><img src="assets/logo/email.png" width="22" height="17"> anasarifin30@students.amikom.ac.id</p>
            </div>
        </div>
		<div class="footer-bottom">copyright &copy; 2024. Amanah Link</div>
    </div>
</body>
</html>
