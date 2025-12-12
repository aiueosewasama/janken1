<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ゲーム一覧</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            text-align: center; 
            margin-top: 50px; 
            background-color: #f4f4f4;
        }
        .container { 
            width: 600px; 
            margin: 0 auto; 
            padding: 30px; 
            border: 1px solid #ccc; 
            border-radius: 15px; 
            box-shadow: 5px 5px 15px rgba(0,0,0,0.2); 
            background-color: #ffffff;
        }
        h1 { 
            color: #333; 
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .game-list {
            list-style: none;
            padding: 0;
        }
        .game-list li {
            margin: 15px 0;
        }
        .game-list li a {
            text-decoration: none;
            color: #007bff;
            font-size: 20px;
            padding: 10px 20px;
            display: block;
            border: 1px solid #007bff;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        .game-list li a:hover {
            background-color: #007bff;
            color: white;
            box-shadow: 2px 2px 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎮 ゲーム一覧</h1>
        
        <ul class="game-list">
            <li>
                <a href="./janken.php">
                    ✊✌️✋ じゃんけんゲーム
                </a>
            </li>
            
            </ul>
        
    </div>
</body>
</html>