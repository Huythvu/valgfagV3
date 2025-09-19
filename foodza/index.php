<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✨ My Cute Test Page ✨</title>
    <style>
        body {
            font-family: "Comic Sans MS", cursive, sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            color: #444;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #ff6f91;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        button {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 25px;
            background: #ff9671;
            color: white;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease;
        }

        button:hover {
            transform: scale(1.05);
            background: #ff6f91;
        }

        .heart {
            font-size: 3rem;
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <h1>🌸 Welcome to My Test Page 🌸</h1>
    <p>Just a cute little playground for me to try things out 💖</p>
    <div class="heart">💜</div>
    <button onclick="alert('Yay! You clicked me 💕')">Click Me!</button>

    <p>
        <?php echo "Hello from PHP!"; ?>
    </p>

    <?php
    while (have_posts()) {
        the_post();
    }
    ?>

    <h4>BIG TEST IF ITsdsaddsad UPDATES IN GITHUB DESKTOP</h4>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>


</body>

</html>