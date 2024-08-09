<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs./font-awesome/5.15.3/css/all.min.css">
    <style>
@import url('./css/fonts.css');

        body {
            font-family: 'Effra-Regular' !important;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .loader {
            width: 50px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: radial-gradient(farthest-side, #cfcfcf 94%, #0000) top / 8px 8px no-repeat, conic-gradient(#0000 30%, #c5c5c5);
            -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 8px), #000 0);
            animation: l13 1s infinite linear;
        }
        @keyframes l13{ 
            100%{transform: rotate(1turn)}
        }
        #loader-waraper{
            margin-top: 12px;
            display: none;
        }
        .justify-content-center{
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            direction: rtl;
            text-align: right;
        }

        .container1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            margin-left: 20px;
            font-family: 'Effra-Bold', sans-serif;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffeb3b;
        }

        #explore {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            direction: rtl;
        }

        #explore h2 {
            margin-top: 0;
        }

        #search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        #search-form label {
            flex: 1;
        }

        #search-form select,
        #search-form input,
        #search-form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            flex: 2;
        }

        #search-form button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            flex: 1;
        }

        #search-form button:hover {
            background-color: #0056b3;
        }

        .results-container {
            margin-top: 20px;
        }

        .item {
            display: flex;
            flex-wrap: wrap;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .item-picture {
            flex: 1;
            text-align: center;
        }

        .item-picture img {
            max-width: 100%;
            border-radius: 10px;
        }

        .item-details {
            flex: 2;
            padding: 0 20px;
        }

        .item-details h3 {
            margin-top: 0;
        }

        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            header h1, footer p {
                font-size: 1.5em;
            }

            nav a {
                font-size: 1em;
            }

            #search-form {
                flex-direction: column;
                gap: 5px;
            }

            #search-form label,
            #search-form select,
            #search-form input,
            #search-form button {
                flex: 1 1 100%;
            }

            .item {
                flex-direction: column;
                text-align: center;
            }

            .item-details {
                padding: 10px 0;
            }
        }
        .text-center{
            text-align: center;
        }
    </style>
    
</head>

<body>
    <header>
        <div class="container1">
            <h1>قسم المفقودات والموجودات</h1>
            <nav>
            <a href="index.php">تصفح</a>
            <a href="report.php">بلاغ عن مفقود</a>
            <a href="logout.php">تسجيل الخروج</a>


            </nav>
        </div>
    </header>

    <div class="container">
        <section id="explore">
            <h2>تصفح المفقودات</h2>

            <form id="search-form" action="javascript:void(0)">
                <label for="search-field">البحث من خلال:</label>
                <select id="search-field" style="font-family: IBMPlexSansArabic;" name="search-field" required>
                    <option value="" disabled selected>قم بالأختيار من القائمة</option>
                    <option value="name">الاسم</option>
                    <option value="type">النوع</option>
                    <option value="location">الموقع</option>
                    <option value="notes">الملاحظات</option>
                </select>

                <label for="search-value" style="text-align:right;">قيمة البحث:</label>
                <input type="text" id="search-value" name="search-value" placeholder="Enter search value" required>

                <button type="submit" style="font-family: 'IBMPlexSansArabic';"><i class="fas fa-search"></i> ابحث</button>
            </form>
            <hr style="border: 1px dashed lightgrey; margin: 35px 0px;">
            <div class="justify-content-center" id="loader-waraper">
                <div class="loader"></div>
                <p style="text-align:center;">Please wait...</p>
            </div>
            
            <div id="search-results" class="results-container">
                <!-- Example items -->
                <!-- <div class="item">
                    <div class="item-picture">
                        <img src="https://via.placeholder.com/150x100" alt="Lost Item">
                    </div>

                    <div class="item-details">
                        <h3>Item Name 1</h3>
                        <p><strong>Type:</strong> Example Type 1</p>
                        <p><strong>Location:</strong> Lost in the park near the fountain.</p>
                        <p><strong>Notes:</strong> Slightly scratched.</p>
                        <p><strong>Time Reported:</strong> 2024-07-26T12:00</p>
                    </div>
                </div> -->
                <!-- More items can be dynamically added here -->
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Lost and Found Department. All rights reserved.</p>
        </div>
    </footer>
    
    <script type="module" src="report.js"></script>
</body>
</html>
