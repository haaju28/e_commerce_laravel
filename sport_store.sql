-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2023 lúc 09:18 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sport_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_title` varchar(255) DEFAULT NULL,
  `first_image` varchar(255) DEFAULT NULL,
  `first_content` text DEFAULT NULL,
  `second_title` varchar(255) DEFAULT NULL,
  `second_image` varchar(255) DEFAULT NULL,
  `second_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`id`, `first_title`, `first_image`, `first_content`, `second_title`, `second_image`, `second_content`, `created_at`, `updated_at`) VALUES
(1, 'Our Story', '646e4027e5ecc_about-01.jpg', 'Welcome to our premier sports store! We are thrilled to present a haven for all sports enthusiasts. Located in the vibrant city center, our store offers an extensive range of high-quality sporting goods.\r\n\r\nWhether you\'re a professional athlete or a passionate beginner, we have everything you need to excel in your favorite sports. From top-of-the-line equipment to stylish sportswear, our diverse selection caters to all ages and skill levels. Our knowledgeable staff is always ready to assist you in finding the perfect gear and provide expert advice.\r\n\r\nExperience the thrill of shopping in our spacious and modern store, where you\'ll discover the latest innovations from renowned brands. Visit us today and unlock your full potential in the world of sports!\r\nDonec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.\r\n\r\nAny questions? Let us know in store at 189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang or call us on 0855665509', 'Our Mission', '646e4486ae2b5_about-02.jpg', 'At our sports store, our mission is to empower individuals to achieve their athletic goals. We are dedicated to providing exceptional products and services that enable our customers to excel in their chosen sports.\r\n\r\nOur primary objective is to offer a comprehensive range of top-quality sporting goods that cater to various disciplines. From football to basketball, tennis to swimming, we have the equipment and apparel to meet your specific needs. We prioritize sourcing products from trusted brands known for their performance and durability.\r\n\r\nAdditionally, our knowledgeable staff is committed to delivering excellent customer service. We are passionate about assisting our customers in making informed decisions and providing expert advice to enhance their sporting experience.\r\n\r\nVisit our store today and let us help you embark on your journey to success in the world of sports.\r\nCreativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn\'t really do it, they just saw something. It seemed obvious to them after a while.\r\n\r\n- Steve Job’s', '2023-05-24 09:01:27', '2023-05-24 10:08:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_categories`
--

INSERT INTO `article_categories` (`id`, `name`, `slug`, `is_show`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'Fashion', 'fashion', 1, NULL, '2023-05-23 10:49:55', '2023-06-03 07:00:44'),
(8, 'Beauty', 'beauty', 1, NULL, '2023-05-23 10:50:08', '2023-05-23 10:50:08'),
(9, 'Street Style', 'street-style', 1, NULL, '2023-05-23 10:50:29', '2023-05-23 10:50:29'),
(10, 'Life Style', 'life-style', 1, NULL, '2023-05-23 10:50:40', '2023-05-23 10:50:40'),
(11, 'DIY & Crafts', 'diy-crafts', 1, NULL, '2023-05-23 10:50:51', '2023-05-23 10:50:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `sub_title`, `status`, `created_at`, `updated_at`) VALUES
(2, '646c6c153a355_slide-01.jpg', 'new season', 'Women Collection 2018', 1, '2023-05-23 00:32:37', '2023-06-03 07:11:23'),
(3, '646c6c7467d04_slide-02.jpg', 'Jackets & Coats', 'Men New-Season', 1, '2023-05-23 00:34:12', '2023-05-23 00:34:12'),
(4, '646c6c973ea83_slide-03.jpg', 'New arrivals', 'Men Collection 2018', 1, '2023-05-23 00:34:47', '2023-05-23 00:34:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `author`, `image`, `short_description`, `description`, `status`, `is_approved`, `created_at`, `updated_at`, `article_category_id`) VALUES
(1, '8 Inspiring Ways to Wear Dresses in the Winter', '8-inspiring-ways-to-wear-dresses-in-the-winter', 'Nguyễn Trung Hậu', '646dcdbe0d198_blog-01.jpg', 'If I could wear a dress every day I would, as I just love the way I look in them! In the winter however, this isn’t always practical. Today I am sharing eight inspiring ways to wear dresses in the winter, and at the same time stay warm!', '<p>If you are in no way, shape, or form ready for autumn to end, same here. Unfortunately, the coming of winter is inevitable (this is especially true for the East Coast — fall lasts approximately .2 seconds in New Jersey), and our best line of defense against the chill is the clothing on our backs, aka cute <a href=\"https://www.instyle.com/fashion/street-style/winter-street-style\">winter outfits</a>.</p><p><a href=\"https://www.instyle.com/fashion/clothing/fall-winter-trends-2021-fashion-editor\"><strong>I\'m a Fashion Editor, and These 11 Trends Are the Secret to All My Fall Outfits</strong></a></p><p>Believe it or not, frigid conditions actually make for optimal fashion moments. From cozy sweaters to statement coats, not to mention endless ways to accessorize with <a href=\"https://www.instyle.com/fashion/accessories/hats-style-outfit-ideas\">different style </a>hats, scarves, and boots, there are so many pieces to play around with. The key is to create looks that are as fashionable as they are functional; pieces that look cute but that also keep you warm.</p><p><img src=\"https://www.instyle.com/thmb/7Ptv-knKgSmgsB8_8hZGpaCngOw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/102221-Fashion-Winter-Lead-2000-150299067e504d869074471bbde00834.jpg\" alt=\"Winter\" srcset=\"https://www.instyle.com/thmb/GxTM3-Z1w_oXlABZ8ugRb89IOrY=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/102221-Fashion-Winter-Lead-2000-150299067e504d869074471bbde00834.jpg 750w\" sizes=\"100vw\" width=\"1333\"></p><p>EDWARD BERTHELOT/GETTY IMAGES</p><p>For inspiration, we asked stylists for the winter outfits they can\'t wait to put together once the seasons change, and it honestly made us excited for all the possibilities.</p><p>&nbsp;</p><p><a href=\"https://www.instyle.com/fashion/clothing/plus-3-fashion-rule\">The Plus-3 Rule Will Change the Way You Dress Forever</a></p><h2>Embrace Seasonal Colors</h2><p><img src=\"https://www.instyle.com/thmb/lIpKbU2iFqjoiPi5e84edWSmrZA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-1-2000-292d4e070a6a4084b0f3a5094a495f2f.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/Jye7YehkjL9Sm6h2Qz0IAGaPVxQ=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-1-2000-292d4e070a6a4084b0f3a5094a495f2f.jpg 750w\" sizes=\"100vw\" width=\"1335\"></p><p>VANNI BASSETTI/GETTY IMAGES</p><p>More specifically, rich shades of green. Celebrity stylist <a href=\"https://www.cindyconroy.com/\">Cindy Conroy</a> tells <i>InStyle</i> she\'s \"getting giddy just thinking about donning an emerald green showstopper\" in the upcoming season.</p><p>As for how she plans to style the shade? \"A mini dress all the way. With all that <i>kapow</i>, I want to tame it with a soft suede over-the-knee boot and a wool beret as the cherry on top.\"</p><h2>Swap Lightweight Jackets for Statement Coats</h2><p><img src=\"https://www.instyle.com/thmb/k5bbIMQhwYRZJSdMTeoffh5dnbo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-2-2000-adf6893a307c4876be1a2e988aaaef4e.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/soJLaqU4gMmxC-w_C7S8p17S7kA=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-2-2000-adf6893a307c4876be1a2e988aaaef4e.jpg 750w\" sizes=\"100vw\" width=\"1334\"></p><p>EDWARD BERTHELOT/GETTY IMAGES</p><p>With the introduction of cold weather, Conroy says she\'s more than ready for a dramatic coat moment.</p><p>\"I treated myself last year to this <a href=\"https://www.instagram.com/p/CMaQfLChZQj/\">heart-stopping faux fur</a> pink number. It\'s very runway and ultra-fun. I swear I\'ll wear it till I\'m 90,\" she tells <i>InStyle</i>. \"Styled up with a silky slip dress, black leather gloves, and a vintage clutch, it makes me feel like Barbie.\"</p><h2>Mix and Match Shades</h2><p><img src=\"https://www.instyle.com/thmb/vrv0ClDDlyQ3yP3eYRXdh4md6aI=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-3-2000-4900eb6ab8d24645b1e5f4244a5fcca3.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/yTVT_zhiPdF5epTWo4bf_TjjpGk=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-3-2000-4900eb6ab8d24645b1e5f4244a5fcca3.jpg 750w\" sizes=\"100vw\" width=\"1334\"></p><p>STREETSTYLESHOOTERS/GETTY IMAGES</p><p>But do so subtly, adds Bryn Taylor. \"For example, my favorite [color combination] as of late is black and chocolate brown,\" the personal stylist and founder of Ouisa clothing tells us. \"I\'m excited about a chunky, oversized brown sweater paired with my <a href=\"https://ouisa.clothing/products/the-panel-legging?variant=40528263905452\">Ouisa black leggings</a>. The color combo elevates the look, while the chunky knits and leggings keep everything comfortable. I\'ll finish the look with some Western boots in a taupe suede to keep the tonal effect.\"</p><p><a href=\"https://www.instyle.com/fashion/clothing/colorblocking-trend-spring-2022\"><strong>You Can Easily Recreate This Spring \'22 Trend Using the Clothes in Your Closet</strong></a></p><h2>Spotlight Your Base Layers</h2><p><img src=\"https://www.instyle.com/thmb/c2FE1AdV1gCEB-abXjPn1cb8MBU=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-4-2000-971645a9452f496ba62478fdeec0e5c0.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/kAw-ZrB9Cxcwv5p74TXZ-s1VMxE=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-4-2000-971645a9452f496ba62478fdeec0e5c0.jpg 750w\" sizes=\"100vw\" width=\"1334\"></p><p>STREETSTYLESHOOTERS/GETTY IMAGES</p><p>For winter 2021, Taylor says that instead of wearing a turtleneck as a base layer, she\'ll be \"riding the minimalist wave\" and making the turtleneck the star of the outfit.</p><p>\"My current favorite is the <a href=\"https://ouisa.clothing/products/the-mock-neck\">Ouisa mock neck</a>, which is made in a stretch rib knit that never loses its shape,\" Taylor says. \"I\'ll style it alongside high-waisted, relaxed-fit jeans and a \'90s slim boot.\"</p><h2>Look to History For Style Inspiration</h2><p><img src=\"https://www.instyle.com/thmb/-WtysoCughPgmVHI4uMqlwK3uE4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-5-2000-589c66a8063348f9b96d3fbe253031d8.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/WvKoqIcbhMlSnY3QjLzBZIbYLcA=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-5-2000-589c66a8063348f9b96d3fbe253031d8.jpg 750w\" sizes=\"100vw\" width=\"1333\"></p><p>EDWARD BERTHELOT/GETTY IMAGES</p><p>Celebrity stylist <a href=\"http://freemenbymickey.com/the-artist\">Mickey Freeman</a> says that while the military trend is always recurring this time of year, being more period-specific can put a unique spin on the aesthetic.</p><p>\"For example, referencing WW2 fashion with pieces, like a modernized shearling aviator jacket or a double breasted leather trench coat with gold buttons, paired with a luxe cashmere turtleneck and premium blue denim pants,\" Freeman explains. \"Finish off the look with long leather opera gloves, long line combat boots or knee high heeled boots, and oversized aviators to add just a hint of toughness. And don\'t forget your beret and an oversized scarf to add a dramatic \'cherry on top.\'\"</p><h2>Rock a Power Suit</h2><p><img src=\"https://www.instyle.com/thmb/Y760kUOTX2b9QczeK03ywRiFYtA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-6-2000-9692e36df91b464f8b1813ee03749cb7.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/kAILXr-FJCRoJGmn34V-R1pnXF8=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-6-2000-9692e36df91b464f8b1813ee03749cb7.jpg 750w\" sizes=\"100vw\" width=\"1333\"></p><p>EDWARD BERTHELOT/GETTY IMAGES</p><p>Freeman wants <i>InStyle</i> readers to know that in 2021, Savile Row\'s laser-sharp tailoring is no longer reserved only for menswear.</p><p>\"Whether worn with a silk T-shirt or crisp collared shirt, trainers or sky-high pumps, the centerpiece to this look is in the overall fit,\" he says. \"It\'s also a great idea to utilize understated accessories, as this preserves the suit as the focal point.\"</p><h2>Break Out the Sweater Dresses</h2><p><img src=\"https://www.instyle.com/thmb/07BunBXJXQZJZEmvIkq_-9pSswE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-7-2000-afb4171095f74e8fa00f6e8396f6105a.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/invpHGQ0JBTFaT_mSoFqVOrJPlI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-7-2000-afb4171095f74e8fa00f6e8396f6105a.jpg 750w\" sizes=\"100vw\" width=\"1333\"></p><p>CHRISTIAN VIERIG/GETTY IMAGES</p><p>In an exclusive interview with InStyle, head stylist at <a href=\"https://www.tobi.com/\">Tobi</a>, Joanna Angeles states that whether long or short, sweater dressers are and will always be a staple of winter style. For the 2021 season, Angeles suggests grabbing your favorite (the <a href=\"https://www.anrdoezrs.net/links/7799179/type/dlg/sid/IS8WinterOutfitsProfessionalStylistsCantWaittoPutTogetherThisSeasonssutton4CloArt4556231202110I/https://www.tobi.com/product/78617-tobi-layla-front-tie-sweater-wrap-midi-dress?color_id=111995\">Mairah Mock Neck Ruched Sweater Dress</a> is a personal favorite) and \"add sheer printed tights, black knee-high leather boots, and a long trench coat for a mix of classic and trendy styles.\"</p><p><a href=\"https://www.instyle.com/fashion/clothing/sweater-dress-outfits\"><strong>14 Sweater Dress Outfits That Aren\'t as Basic as They Sound</strong></a></p><h2>Opt for a Straight Leg Bottom</h2><p><img src=\"https://www.instyle.com/thmb/1TWho8BfFQYkoeUDK9BSBfJixO0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-8-2000-365e3415ec434759b443cc72533b4421.jpg\" alt=\"Winter Outfits\" srcset=\"https://www.instyle.com/thmb/kkZzFz1CWjez9et0gpqWj5_yJKg=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/winter-outfits-8-2000-365e3415ec434759b443cc72533b4421.jpg 750w\" sizes=\"100vw\" width=\"1334\"></p><p>STREETSTYLESHOOTERS/GETTY IMAGES</p><p>Angeles notes the cut in leather (like <a href=\"https://www.tobi.com/product/78480-tobi-melly-high-waisted-pu-cut-out-straight-leg-pants?color_id=111766\">this pair)</a> is slowly becoming a staple piece perfect for any wardrobe.</p><p>\"Pair them with a classic turtleneck top, letterman jacket, chunky lug sole boots, and a beanie for added warmth.\"</p>', 1, 1, '2023-05-24 01:17:14', '2023-05-26 23:45:25', 7),
(3, 'The Great Big List of Men’s Gifts for the Holidays', 'the-great-big-list-of-men-s-gifts-for-the-holidays', 'Admin', '6470812015eef_blog-02.jpg', 'Introducing \"The Great Big List of Men\'s Gifts for the Holidays\"! Discover a curated collection of the most remarkable and thoughtfully selected presents for the special men in your life. From stylish accessories to tech gadgets, this list is your ultimate guide to finding the perfect holiday gift. Get ready to make their season unforgettable!', '<p>The holiday season is fast approaching, and it\'s time to start thinking about finding the perfect gifts for the special men in your life. To help you navigate through the overwhelming choices, we present to you \"The Great Big List of Men\'s Gifts for the Holidays.\"</p><p>This curated collection is designed to take the stress out of holiday shopping and inspire you with unique and thoughtful gift ideas. Whether you\'re shopping for your partner, father, brother, or friend, we\'ve got you covered with a wide range of options.</p><p>From stylish accessories that add a touch of sophistication to their everyday attire, to cutting-edge tech gadgets that will ignite their inner geek, this list has it all. Explore an array of options, including smartwatches, wireless headphones, personalized leather wallets, grooming kits, and much more.</p><p>We understand that every man is unique, so we\'ve included a diverse selection of gifts to suit different personalities and interests. Whether he\'s a sports enthusiast, a whiskey connoisseur, a tech lover, or a fashion-forward individual, you\'ll find something that matches his passions.</p><p>Say goodbye to generic gifts and hello to meaningful presents that will make a lasting impression. The Great Big List of Men\'s Gifts for the Holidays is your go-to resource for finding that perfect gift that will bring a smile to his face and show him just how much you care.</p><p>So, get ready to dive into our comprehensive guide and start checking off your holiday shopping list. Let\'s make this holiday season truly memorable for the men who mean the most to you.</p>', 1, 1, '2023-05-26 02:51:28', '2023-05-26 02:51:28', 9),
(4, '5 Winter-to-Spring Fashion Trends to Try Now', '5-winter-to-spring-fashion-trends-to-try-now', 'Nguyễn Trung Hậu', '647081c6aa37e_blog-03.jpg', 'Stay ahead of the style game with our handpicked selection of must-try trends that seamlessly transition your wardrobe from winter to spring. Embrace the season\'s hottest looks and elevate your fashion game with these on-trend suggestions.', '<p><br>As the chilly winter days gradually give way to the blossoming beauty of spring, it\'s time to refresh your wardrobe with the latest fashion trends. To help you stay ahead of the curve, we present to you \"5 Winter-to-Spring Fashion Trends to Try Now.\"</p><p>Pastel Power: Bid farewell to dark hues and embrace the soft and serene pastel shades. From mint green to baby pink, pastels bring a refreshing and feminine touch to any outfit. Incorporate pastel-colored sweaters, blouses, or accessories into your ensemble for an instant springtime vibe.</p><p>Statement Trench Coats: Transition your winter outerwear to spring by opting for statement trench coats. Look for lightweight options in vibrant colors or playful prints that add a touch of flair to your outfit. A stylish trench coat instantly elevates any look while keeping you comfortable during those unpredictable weather days.</p><p>Floral Prints: It\'s no surprise that floral prints make a comeback during spring. Embrace the blooming season by incorporating floral patterns into your wardrobe. Whether it\'s a flowy dress, a printed blouse, or a pair of floral trousers, these prints add a touch of elegance and a burst of nature to your ensemble.</p><p>Denim Delight: Denim is a timeless wardrobe staple, and it seamlessly transitions from winter to spring. Opt for lighter washes or distressed denim for a more casual and relaxed look. Pair your favorite denim jeans with a lightweight sweater or a trendy denim jacket to create an effortlessly chic outfit.</p><p>Chunky Sneakers: Comfort meets style with the rise of chunky sneakers. These statement footwear pieces are perfect for adding a sporty and edgy touch to your winter-to-spring outfits. Pair them with dresses, skirts, or jeans for a trendy and comfortable look.</p><p>With these 5 winter-to-spring fashion trends, you\'ll effortlessly navigate the changing seasons in style. Embrace the softer color palettes, playful prints, and lightweight fabrics that characterize this time of year. Step out with confidence and make a fashionable statement as you transition from winter\'s coziness to spring\'s vibrancy.</p>', 1, 1, '2023-05-26 02:54:14', '2023-05-26 23:45:34', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Black', 'black', 1, NULL, '2023-05-25 23:24:12', '2023-06-03 07:01:56'),
(2, 'White', 'white', 1, NULL, '2023-05-25 23:24:21', '2023-05-25 23:24:21'),
(3, 'Blue', 'blue', 1, NULL, '2023-05-25 23:24:30', '2023-05-25 23:24:30'),
(4, 'Brown', 'brown', 1, NULL, '2023-05-25 23:24:38', '2023-05-25 23:24:38'),
(5, 'Midnight', 'midnight', 1, NULL, '2023-05-25 23:24:50', '2023-05-25 23:24:50'),
(6, 'Dark grey', 'dark-grey', 1, NULL, '2023-05-25 23:25:00', '2023-05-25 23:25:00'),
(7, 'Gray', 'gray', 1, NULL, '2023-05-25 23:25:11', '2023-05-25 23:25:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2014_10_12_000000_create_users_table', 3),
(13, '2023_05_20_163806_create_web_information_table', 4),
(15, '2023_05_21_054050_create_article_categories_table', 5),
(18, '2023_05_22_190438_create_banners_table', 7),
(19, '2023_05_15_083800_create_product_categories_table', 8),
(23, '2023_05_23_175258_create_blogs_table', 9),
(27, '2023_05_24_152316_create_abouts_table', 11),
(30, '2023_05_21_071833_create_products_table', 12),
(31, '2023_05_21_072810_create_product_images_table', 12),
(32, '2023_05_24_123122_create_colors_table', 13),
(33, '2023_05_26_055326_create_product_colors_table', 13),
(34, '2023_05_26_082837_create_sizes_table', 14),
(35, '2023_05_26_083108_create_product_sizes_table', 15),
(42, '2019_12_22_015115_create_short_urls_table', 17),
(43, '2019_12_22_015214_create_short_url_visits_table', 17),
(44, '2020_02_11_224848_update_short_url_table_for_version_two_zero_zero', 17),
(45, '2020_02_12_008432_update_short_url_visits_table_for_version_two_zero_zero', 17),
(46, '2020_04_10_224546_update_short_url_table_for_version_three_zero_zero', 17),
(47, '2020_04_20_009283_update_short_url_table_add_option_to_forward_query_params', 17),
(48, '2023_05_26_170544_create_orders_table', 18),
(49, '2023_05_26_170759_create_order_items_table', 18),
(50, '2023_05_26_171246_create_order_payment_methods_table', 18),
(51, '2023_05_31_195638_add_deleted_at_to_sizes_table', 19),
(52, '2023_06_02_145158_create_wishlists_table', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `status`, `payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'done', 'cod', '2023-05-31 14:06:51', '2023-06-02 13:18:22', NULL),
(3, 14, 'Hồ Chí Minh', '0913533110', 'done', 'cod', '2023-06-02 13:13:24', '2023-06-02 13:18:04', NULL),
(4, 16, 'Hồ Chí Minh', '+84855665509', 'done', 'cod', '2023-06-02 13:16:51', '2023-06-02 13:17:38', NULL),
(5, 16, 'Hồ Chí Minh', '+84855665509', 'processing', 'cod', '2023-06-02 13:20:34', '2023-06-02 13:20:37', NULL),
(6, 14, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'cod', '2023-06-02 15:30:49', '2023-06-02 15:30:53', NULL),
(7, 19, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'cod', '2023-06-02 15:45:48', '2023-06-02 15:45:51', NULL),
(8, 19, 'Hồ Chí Minh', '0913533110', 'done', 'cod', '2023-06-02 15:49:53', '2023-06-02 15:59:55', NULL),
(9, 19, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'vnpay_atm', '2023-06-02 17:06:49', '2023-06-02 17:18:06', NULL),
(10, 20, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'cod', '2023-06-03 05:19:58', '2023-06-03 05:20:02', NULL),
(11, 16, 'Hồ Chí Minh', '+84855665509', 'processing', 'cod', '2023-06-03 06:18:55', '2023-06-03 06:18:58', NULL),
(12, 21, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'done', 'vnpay_atm', '2023-06-03 06:24:32', '2023-06-03 06:44:59', NULL),
(13, 16, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'cod', '2023-06-03 06:29:10', '2023-06-03 06:29:13', NULL),
(14, 16, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'processing', 'cod', '2023-06-03 06:29:13', '2023-06-03 06:29:18', NULL),
(35, 16, 'Trung Quốc', '123456789', 'processing', 'cod', '2023-06-03 06:38:47', '2023-06-03 06:38:50', NULL),
(36, 16, '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'done', 'cod', '2023-06-03 06:44:21', '2023-06-03 06:44:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `qty`, `price`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 6, 4, 4, 1385000, 'Lightweight Jacket', '2023-05-31 14:06:51', '2023-05-31 14:06:51', NULL),
(2, NULL, 6, 6, 2, 2, 610000, 'Only Check Trouser', '2023-05-31 14:10:00', '2023-05-31 14:10:00', NULL),
(3, 3, 3, 6, 4, 2, 1385000, 'Lightweight Jacket', '2023-06-02 13:13:24', '2023-06-02 13:13:24', NULL),
(4, 4, 18, 1, 7, 1, 2042108, 'Mini Silver Mesh Watch', '2023-06-02 13:16:51', '2023-06-02 13:16:51', NULL),
(5, 4, 12, 1, 12, 3, 1760438, 'Converse All Star Hi Plimsolls', '2023-06-02 13:16:51', '2023-06-02 13:16:51', NULL),
(6, 4, 9, 1, 7, 1, 2182943, 'Vintage Inspired Classic', '2023-06-02 13:16:51', '2023-06-02 13:16:51', NULL),
(7, 5, 13, 6, 2, 1, 610285, 'Femme T-Shirt In Stripe', '2023-06-02 13:20:34', '2023-06-02 13:20:34', NULL),
(8, 5, 16, 1, 3, 3, 422505, 'T-Shirt with Sleeve', '2023-06-02 13:20:34', '2023-06-02 13:20:34', NULL),
(9, 5, 17, 1, 2, 2, 1290988, 'Pretty Little Thing', '2023-06-02 13:20:34', '2023-06-02 13:20:34', NULL),
(10, 6, 17, 1, 1, 1, 1290988, 'Pretty Little Thing', '2023-06-02 15:30:49', '2023-06-02 15:30:49', NULL),
(11, 6, 9, 1, 7, 1, 2182943, 'Vintage Inspired Classic', '2023-06-02 15:30:49', '2023-06-02 15:30:49', NULL),
(12, 8, 16, 2, 2, 13, 422505, 'T-Shirt with Sleeve', '2023-06-02 15:49:53', '2023-06-02 15:49:53', NULL),
(13, 9, 3, 6, 1, 1, 1385000, 'Lightweight Jacket', '2023-06-02 17:06:49', '2023-06-02 17:06:49', NULL),
(14, 9, 18, 1, 7, 1, 2042108, 'Mini Silver Mesh Watch', '2023-06-02 17:06:49', '2023-06-02 17:06:49', NULL),
(15, 9, 12, 1, 8, 1, 1760438, 'Converse All Star Hi Plimsolls', '2023-06-02 17:06:49', '2023-06-02 17:06:49', NULL),
(16, 10, 9, 1, 7, 1, 2182943, 'Vintage Inspired Classic', '2023-06-03 05:19:58', '2023-06-03 05:19:58', NULL),
(17, 10, 17, 1, 3, 1, 1290988, 'Pretty Little Thing', '2023-06-03 05:19:58', '2023-06-03 05:19:58', NULL),
(18, 11, 17, 1, 4, 1, 1290988, 'Pretty Little Thing', '2023-06-03 06:18:55', '2023-06-03 06:18:55', NULL),
(19, 11, 18, 1, 7, 3, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:18:55', '2023-06-03 06:18:55', NULL),
(20, 11, 18, 7, 7, 2, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:18:55', '2023-06-03 06:18:55', NULL),
(21, 12, 18, 1, 7, 3, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:24:32', '2023-06-03 06:24:32', NULL),
(22, 12, 18, 7, 7, 3, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:24:32', '2023-06-03 06:24:32', NULL),
(23, 13, 18, 1, 7, 1, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:29:10', '2023-06-03 06:29:10', NULL),
(24, 35, 18, 7, 7, 3, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:38:47', '2023-06-03 06:38:47', NULL),
(25, 36, 18, 1, 7, 1, 2042108, 'Mini Silver Mesh Watch', '2023-06-03 06:44:21', '2023-06-03 06:44:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_payment_methods`
--

CREATE TABLE `order_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_provider` varchar(255) NOT NULL,
  `total_balance` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_payment_methods`
--

INSERT INTO `order_payment_methods` (`id`, `order_id`, `payment_provider`, `total_balance`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'cod', 5540000, 'done', '2023-05-31 14:06:51', '2023-05-31 14:06:55', NULL),
(2, NULL, 'vnpay_atm', 1220000, 'done', '2023-05-31 14:10:00', '2023-05-31 14:10:31', NULL),
(3, 3, 'cod', 2770000, 'done', '2023-06-02 13:13:24', '2023-06-02 13:13:29', NULL),
(4, 4, 'cod', 9506365, 'done', '2023-06-02 13:16:51', '2023-06-02 13:16:54', NULL),
(5, 5, 'cod', 4459776, 'done', '2023-06-02 13:20:34', '2023-06-02 13:20:37', NULL),
(6, 6, 'cod', 3473931, 'done', '2023-06-02 15:30:49', '2023-06-02 15:30:53', NULL),
(8, 8, 'cod', 5492565, 'done', '2023-06-02 15:49:53', '2023-06-02 15:49:57', NULL),
(9, 9, 'vnpay_atm', 5187546, 'done', '2023-06-02 17:06:49', '2023-06-02 17:07:19', NULL),
(10, 10, 'cod', 3473931, 'done', '2023-06-03 05:19:58', '2023-06-03 05:20:02', NULL),
(11, 11, 'cod', 11501528, 'done', '2023-06-03 06:18:55', '2023-06-03 06:18:58', NULL),
(12, 12, 'vnpay_atm', 12252648, 'done', '2023-06-03 06:24:32', '2023-06-03 06:26:40', NULL),
(13, 13, 'cod', 2042108, 'done', '2023-06-03 06:29:10', '2023-06-03 06:29:13', NULL),
(29, NULL, 'cod', 0, 'done', '2023-06-03 06:30:12', '2023-06-03 06:30:15', NULL),
(30, NULL, 'cod', 0, 'done', '2023-06-03 06:30:16', '2023-06-03 06:30:19', NULL),
(31, NULL, 'cod', 0, 'done', '2023-06-03 06:30:20', '2023-06-03 06:30:23', NULL),
(32, NULL, 'cod', 0, 'done', '2023-06-03 06:30:24', '2023-06-03 06:30:27', NULL),
(33, NULL, 'cod', 0, 'done', '2023-06-03 06:33:19', '2023-06-03 06:33:23', NULL),
(34, NULL, 'cod', 0, 'done', '2023-06-03 06:34:12', '2023-06-03 06:34:15', NULL),
(35, 35, 'cod', 6126324, 'done', '2023-06-03 06:38:47', '2023-06-03 06:38:50', NULL),
(36, 36, 'cod', 2042108, 'done', '2023-06-03 06:44:21', '2023-06-03 06:44:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('trunghau280301@gmail.com', '$2y$10$HyY31yFQUuSrGqwMSPRqSOpK9cW7Sp39SoKrbzuL73X5pXa9j5/mC', '2023-05-30 08:38:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `short_description` tinytext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `materials` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_categories_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image_url`, `short_description`, `description`, `price`, `discount_price`, `qty`, `weight`, `dimensions`, `materials`, `status`, `slug`, `created_at`, `updated_at`, `product_categories_id`) VALUES
(3, 'Lightweight Jacket', '64708ed2cebc5_product-detail-02.jpg', 'This jacket combines style and functionality with its lightweight design, making it perfect for layering or wearing on its own. Stay comfortable and stylish while enjoying the freedom of movement and protection from light weather.', '<p>The Lightweight Jacket is a must-have addition to your wardrobe. Designed with both style and functionality in mind, this jacket offers the perfect balance between comfort and versatility. Its lightweight construction ensures ease of movement, making it suitable for various activities and climates. Whether you\'re heading out for a casual outing, an outdoor adventure, or simply need a stylish layering option, this jacket has you covered. With features like a durable zipper, adjustable cuffs, and multiple pockets, it offers convenience and practicality. Available in a range of trendy colors and designs, the Lightweight Jacket effortlessly elevates your look while providing the necessary protection from light winds and unexpected weather. Stay fashion-forward and ready for any occasion with this essential outerwear piece.</p>', 1385000, NULL, 3, 0.79, '110 x 33 x 100 cm', '60% cotton', 1, 'lightweight-jacket', '2023-05-26 03:19:45', '2023-06-02 17:07:44', 4),
(4, 'Esprit Ruffle Shirt', '6470ce8b40847_product-01.jpg', NULL, NULL, 399033, NULL, 12, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'esprit-ruffle-shirt', '2023-05-26 08:21:47', '2023-05-29 13:21:24', 5),
(5, 'Herschel supply', '6470cee364edd_product-02.jpg', NULL, NULL, 821538, NULL, 14, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'herschel-supply', '2023-05-26 08:23:15', '2023-05-29 13:21:46', 5),
(6, 'Only Check Trouser', '6470cf3e9e88f_product-03.jpg', NULL, NULL, 610000, NULL, 10, 0.79, '110 x 33 x 100 cm', '60% cotton', 1, 'only-check-trouser', '2023-05-26 08:24:46', '2023-05-29 13:19:18', 4),
(7, 'Classic Trench Coat', '6470cf83b7cf6_product-04.jpg', NULL, NULL, 1760438, NULL, 5, 0.79, '110 x 33 x 100 cm', '60% cotton', 1, 'classic-trench-coat', '2023-05-26 08:25:55', '2023-05-29 13:22:03', 5),
(8, 'Front Pocket Jumper', '6470cfca7b6ab_product-05.jpg', NULL, NULL, 821538, NULL, 6, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'front-pocket-jumper', '2023-05-26 08:27:06', '2023-05-29 13:22:19', 5),
(9, 'Vintage Inspired Classic', '6470d019d5d5b_product-06.jpg', NULL, NULL, 2182943, NULL, 4, 0.79, NULL, NULL, 1, 'vintage-inspired-classic', '2023-05-26 08:28:25', '2023-06-02 13:17:38', 8),
(10, 'Shirt in Stretch Cotton', '6470d06fc2422_product-07.jpg', NULL, NULL, 1244043, NULL, 10, 0.7, '110 x 33 x 100 cm', '60% cotton', 1, 'shirt-in-stretch-cotton', '2023-05-26 08:29:51', '2023-05-29 13:22:37', 5),
(11, 'Pieces Metallic Printed', '6470d0c0abbab_product-08.jpg', NULL, NULL, 445978, NULL, 20, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'pieces-metallic-printed', '2023-05-26 08:31:12', '2023-05-29 13:22:53', 5),
(12, 'Converse All Star Hi Plimsolls', '6470d1f159fa4_product-09.jpg', NULL, NULL, 1760438, NULL, 6, 0.79, NULL, NULL, 1, 'converse-all-star-hi-plimsolls', '2023-05-26 08:36:17', '2023-06-02 17:07:44', 7),
(13, 'Femme T-Shirt In Stripe', '6470d242e095a_product-10.jpg', NULL, NULL, 610285, NULL, 20, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'femme-t-shirt-in-stripe', '2023-05-26 08:37:38', '2023-05-29 13:23:15', 5),
(14, 'Men shirt', '6470d2a3443b5_product-11.jpg', NULL, NULL, 1478000, NULL, 12, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'men-shirt', '2023-05-26 08:39:15', '2023-05-29 13:20:10', 4),
(15, 'LV Dove 40MM Reversible Belt', '6470d4a030210_product-12.jpg', NULL, NULL, 1478000, NULL, 3, 0.79, NULL, NULL, 1, 'lv-dove-40mm-reversible-belt', '2023-05-26 08:47:44', '2023-05-29 13:20:31', 4),
(16, 'T-Shirt with Sleeve', '6470d4e0c12e4_product-13.jpg', NULL, NULL, 422505, NULL, 1, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 't-shirt-with-sleeve', '2023-05-26 08:48:48', '2023-06-02 15:59:55', 5),
(17, 'Pretty Little Thing', '6470d51bc6df4_product-14.jpg', NULL, NULL, 1290988, NULL, 15, 0.6, '110 x 33 x 100 cm', '60% cotton', 1, 'pretty-little-thing', '2023-05-26 08:49:47', '2023-05-29 13:24:00', 5),
(18, 'Mini Silver Mesh Watch', '6470d560b8e33_product-15.jpg', NULL, NULL, 2042108, NULL, -4, 0.79, NULL, NULL, 1, 'mini-silver-mesh-watch', '2023-05-26 08:50:56', '2023-06-03 06:44:59', 8),
(19, 'Square Neck Back', '6470d5925aa83_product-16.jpg', NULL, NULL, 704175, NULL, 12, 0.6, '110 x 33 x 100 cm', '60% cotton', 0, 'square-neck-back', '2023-05-26 08:51:46', '2023-05-29 13:24:17', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `trend` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `trend`, `is_show`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Men', 'men', 'Spring 2018', 1, '2023-05-25 23:23:32', '2023-06-03 07:01:07', NULL),
(5, 'Women', 'women', 'Spring 2018', 1, '2023-05-25 23:23:53', '2023-05-25 23:23:53', NULL),
(6, 'Bag', 'bag', NULL, 1, '2023-05-26 02:54:56', '2023-05-26 02:54:56', NULL),
(7, 'Shoes', 'shoes', NULL, 1, '2023-05-26 02:55:10', '2023-05-26 02:55:10', NULL),
(8, 'Watches', 'watches', NULL, 1, '2023-05-26 02:55:28', '2023-06-03 07:03:55', '2023-06-03 07:03:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_colors`
--

INSERT INTO `product_colors` (`id`, `created_at`, `updated_at`, `product_id`, `color_id`) VALUES
(14, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 1),
(15, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 2),
(16, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 3),
(17, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 6),
(18, '2023-05-26 08:21:47', '2023-05-26 08:21:47', 4, 2),
(19, '2023-05-26 08:21:47', '2023-05-26 08:21:47', 4, 4),
(20, '2023-05-26 08:23:15', '2023-05-26 08:23:15', 5, 1),
(21, '2023-05-26 08:23:15', '2023-05-26 08:23:15', 5, 2),
(22, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 1),
(23, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 3),
(24, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 6),
(25, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 1),
(26, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 4),
(27, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 5),
(28, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 6),
(29, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 7),
(30, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 1),
(31, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 6),
(32, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 7),
(33, '2023-05-26 08:28:25', '2023-05-26 08:28:25', 9, 1),
(34, '2023-05-26 08:29:51', '2023-05-26 08:29:51', 10, 1),
(35, '2023-05-26 08:29:51', '2023-05-26 08:29:51', 10, 2),
(36, '2023-05-26 08:29:51', '2023-05-26 08:29:51', 10, 6),
(37, '2023-05-26 08:29:51', '2023-05-26 08:29:51', 10, 7),
(38, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 1),
(39, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 2),
(40, '2023-05-26 08:36:17', '2023-05-26 08:36:17', 12, 1),
(41, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 1),
(42, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 2),
(43, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 5),
(44, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 6),
(45, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 1),
(46, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 2),
(47, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 3),
(48, '2023-05-26 08:47:44', '2023-05-26 08:47:44', 15, 1),
(49, '2023-05-26 08:47:44', '2023-05-26 08:47:44', 15, 4),
(50, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 1),
(51, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 2),
(52, '2023-05-26 08:49:47', '2023-05-26 08:49:47', 17, 1),
(53, '2023-05-26 08:50:56', '2023-05-26 08:50:56', 18, 1),
(54, '2023-05-26 08:50:56', '2023-05-26 08:50:56', 18, 7),
(55, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 1),
(56, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 2),
(57, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `created_at`, `updated_at`, `product_id`) VALUES
(20, '64708f17b7ca5_product-detail-01.jpg', '2023-05-26 03:51:03', '2023-05-26 03:51:03', 3),
(21, '64708f17bb310_product-detail-02.jpg', '2023-05-26 03:51:03', '2023-05-26 03:51:03', 3),
(22, '64708f17bd083_product-detail-03.jpg', '2023-05-26 03:51:03', '2023-05-26 03:51:03', 3),
(23, '64771632e83c8_product-03.jpg', '2023-05-31 09:41:06', '2023-05-31 09:41:06', 6),
(28, '647ac8c4e790f_product-16.jpg', '2023-06-03 04:59:48', '2023-06-03 04:59:48', 19),
(29, '647ac8d4e30ec_product-15.jpg', '2023-06-03 05:00:04', '2023-06-03 05:00:04', 18),
(30, '647ac8e5443b6_product-14.jpg', '2023-06-03 05:00:21', '2023-06-03 05:00:21', 17),
(31, '647ac8f61e3ec_product-13.jpg', '2023-06-03 05:00:38', '2023-06-03 05:00:38', 16),
(32, '647ac90520996_product-12.jpg', '2023-06-03 05:00:53', '2023-06-03 05:00:53', 15),
(33, '647ac914c80e5_product-11.jpg', '2023-06-03 05:01:08', '2023-06-03 05:01:08', 14),
(34, '647ac92375f34_product-10.jpg', '2023-06-03 05:01:23', '2023-06-03 05:01:23', 13),
(35, '647ac932b326a_product-09.jpg', '2023-06-03 05:01:38', '2023-06-03 05:01:38', 12),
(36, '647ac94318323_product-08.jpg', '2023-06-03 05:01:55', '2023-06-03 05:01:55', 11),
(37, '647ac9525f549_product-07.jpg', '2023-06-03 05:02:10', '2023-06-03 05:02:10', 10),
(38, '647ac97578ac1_product-06.jpg', '2023-06-03 05:02:45', '2023-06-03 05:02:45', 9),
(39, '647ac9899d8b4_product-05.jpg', '2023-06-03 05:03:05', '2023-06-03 05:03:05', 8),
(40, '647ac998ebbc6_product-02.jpg', '2023-06-03 05:03:20', '2023-06-03 05:03:20', 5),
(41, '647ac9aaa28b3_product-01.jpg', '2023-06-03 05:03:38', '2023-06-03 05:03:38', 4),
(42, '647ac9bb12c68_product-04.jpg', '2023-06-03 05:03:55', '2023-06-03 05:03:55', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `created_at`, `updated_at`, `product_id`, `size_id`) VALUES
(7, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 1),
(8, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 2),
(9, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 3),
(10, '2023-05-26 03:19:45', '2023-05-26 03:19:45', 3, 4),
(11, '2023-05-26 08:21:47', '2023-05-26 08:21:47', 4, 1),
(12, '2023-05-26 08:21:47', '2023-05-26 08:21:47', 4, 2),
(13, '2023-05-26 08:21:47', '2023-05-26 08:21:47', 4, 3),
(14, '2023-05-26 08:23:15', '2023-05-26 08:23:15', 5, 1),
(15, '2023-05-26 08:23:15', '2023-05-26 08:23:15', 5, 2),
(16, '2023-05-26 08:23:15', '2023-05-26 08:23:15', 5, 3),
(17, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 1),
(18, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 2),
(19, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 3),
(20, '2023-05-26 08:24:46', '2023-05-26 08:24:46', 6, 4),
(21, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 3),
(22, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 4),
(23, '2023-05-26 08:25:55', '2023-05-26 08:25:55', 7, 5),
(24, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 1),
(25, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 2),
(26, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 3),
(27, '2023-05-26 08:27:06', '2023-05-26 08:27:06', 8, 4),
(28, '2023-05-26 08:29:51', '2023-05-26 08:29:51', 10, 1),
(29, '2023-05-26 08:29:52', '2023-05-26 08:29:52', 10, 2),
(30, '2023-05-26 08:29:52', '2023-05-26 08:29:52', 10, 3),
(31, '2023-05-26 08:29:52', '2023-05-26 08:29:52', 10, 4),
(32, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 1),
(33, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 2),
(34, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 3),
(35, '2023-05-26 08:31:12', '2023-05-26 08:31:12', 11, 4),
(36, '2023-05-26 08:34:32', '2023-05-26 08:34:32', 9, 7),
(37, '2023-05-26 08:36:17', '2023-05-26 08:36:17', 12, 8),
(38, '2023-05-26 08:36:17', '2023-05-26 08:36:17', 12, 9),
(39, '2023-05-26 08:36:17', '2023-05-26 08:36:17', 12, 10),
(40, '2023-05-26 08:36:17', '2023-05-26 08:36:17', 12, 12),
(41, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 1),
(42, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 2),
(43, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 3),
(44, '2023-05-26 08:37:38', '2023-05-26 08:37:38', 13, 4),
(45, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 2),
(46, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 3),
(47, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 4),
(48, '2023-05-26 08:39:15', '2023-05-26 08:39:15', 14, 5),
(49, '2023-05-26 08:47:44', '2023-05-26 08:47:44', 15, 10),
(50, '2023-05-26 08:47:44', '2023-05-26 08:47:44', 15, 11),
(51, '2023-05-26 08:47:44', '2023-05-26 08:47:44', 15, 12),
(52, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 1),
(53, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 2),
(54, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 3),
(55, '2023-05-26 08:48:48', '2023-05-26 08:48:48', 16, 4),
(56, '2023-05-26 08:49:47', '2023-05-26 08:49:47', 17, 1),
(57, '2023-05-26 08:49:47', '2023-05-26 08:49:47', 17, 2),
(58, '2023-05-26 08:49:47', '2023-05-26 08:49:47', 17, 3),
(59, '2023-05-26 08:49:47', '2023-05-26 08:49:47', 17, 4),
(60, '2023-05-26 08:50:56', '2023-05-26 08:50:56', 18, 7),
(61, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 1),
(62, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 2),
(63, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 3),
(64, '2023-05-26 08:51:46', '2023-05-26 08:51:46', 19, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `short_urls`
--

CREATE TABLE `short_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_url` text NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `default_short_url` varchar(255) NOT NULL,
  `single_use` tinyint(1) NOT NULL,
  `forward_query_params` tinyint(1) NOT NULL DEFAULT 0,
  `track_visits` tinyint(1) NOT NULL,
  `redirect_status_code` int(11) NOT NULL DEFAULT 301,
  `track_ip_address` tinyint(1) NOT NULL DEFAULT 0,
  `track_operating_system` tinyint(1) NOT NULL DEFAULT 0,
  `track_operating_system_version` tinyint(1) NOT NULL DEFAULT 0,
  `track_browser` tinyint(1) NOT NULL DEFAULT 0,
  `track_browser_version` tinyint(1) NOT NULL DEFAULT 0,
  `track_referer_url` tinyint(1) NOT NULL DEFAULT 0,
  `track_device_type` tinyint(1) NOT NULL DEFAULT 0,
  `activated_at` timestamp NULL DEFAULT '2023-05-29 00:40:01',
  `deactivated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `short_urls`
--

INSERT INTO `short_urls` (`id`, `destination_url`, `url_key`, `default_short_url`, `single_use`, `forward_query_params`, `track_visits`, `redirect_status_code`, `track_ip_address`, `track_operating_system`, `track_operating_system_version`, `track_browser`, `track_browser_version`, `track_referer_url`, `track_device_type`, `activated_at`, `deactivated_at`, `created_at`, `updated_at`) VALUES
(1, 'https://127.0.0.1:8000/user/order/30', 'k4x9e', 'http://localhost:88/short/k4x9e', 0, 0, 1, 301, 1, 1, 1, 1, 1, 1, 1, '2023-05-31 07:19:59', NULL, '2023-05-31 07:19:59', '2023-05-31 07:19:59'),
(2, 'https://127.0.0.1:8000/user/order/31', 'AVMle', 'http://localhost:88/short/AVMle', 0, 0, 1, 301, 1, 1, 1, 1, 1, 1, 1, '2023-05-31 07:23:44', NULL, '2023-05-31 07:23:44', '2023-05-31 07:23:44'),
(3, 'https://127.0.0.1:8000/user/order/32', 'BNEqN', 'http://localhost:88/short/BNEqN', 0, 0, 1, 301, 1, 1, 1, 1, 1, 1, 1, '2023-05-31 07:41:49', NULL, '2023-05-31 07:41:49', '2023-05-31 07:41:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `short_url_visits`
--

CREATE TABLE `short_url_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_url_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `operating_system_version` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `browser_version` varchar(255) DEFAULT NULL,
  `referer_url` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `short_url_visits`
--

INSERT INTO `short_url_visits` (`id`, `short_url_id`, `ip_address`, `operating_system`, `operating_system_version`, `browser`, `browser_version`, `referer_url`, `device_type`, `visited_at`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Windows', '10.0', 'Edge', '113.0.1774.57', NULL, 'desktop', '2023-05-31 07:28:58', '2023-05-31 07:28:58', '2023-05-31 07:28:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S', 1, '2023-05-26 02:13:54', '2023-06-03 07:02:07', NULL),
(2, 'M', 1, '2023-05-26 02:14:03', '2023-05-31 13:41:21', NULL),
(3, 'L', 1, '2023-05-26 02:14:14', '2023-05-31 13:41:25', NULL),
(4, 'XL', 1, '2023-05-26 02:14:22', '2023-05-26 02:14:22', NULL),
(5, 'XXL', 1, '2023-05-26 02:14:30', '2023-05-26 02:14:30', NULL),
(7, 'Default', 1, '2023-05-26 08:33:02', '2023-05-26 08:33:02', NULL),
(8, '36', 1, '2023-05-26 08:33:13', '2023-05-26 08:33:13', NULL),
(9, '37', 1, '2023-05-26 08:33:24', '2023-05-26 08:33:24', NULL),
(10, '38', 1, '2023-05-26 08:33:32', '2023-05-26 08:33:32', NULL),
(11, '39', 1, '2023-05-26 08:33:41', '2023-05-26 08:33:41', NULL),
(12, '40', 1, '2023-05-26 08:33:49', '2023-05-26 08:33:49', NULL),
(13, '41', 1, '2023-05-26 08:33:58', '2023-05-26 08:33:58', NULL),
(14, '42', 1, '2023-05-26 08:34:08', '2023-05-26 08:34:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `status`, `role`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Miss Lessie Hagenes III', '1-253-849-6859', '14877 Sylvan Landing Suite 867New Clintmouth, SC 71454-5655', 'destinee.prosacco@example.com', 0, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'X166T5vGaP', '2023-05-15 07:44:56', '2023-05-29 16:39:57'),
(2, 'Dario Will', '+1 (585) 264-1213', '2763 Audra Plain Apt. 320\nPort Pearlieport, WA 70444-6865', 'adriel.mayer@example.com', 1, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'd4b8lFkL2s', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(3, 'Hermann Upton', '551.540.0588', '37343 Rosa Corners\nBernhardland, OR 62781-4169', 'jairo.daniel@example.org', 0, 1, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'VoUWUAdLkU', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(4, 'Lorenzo Wiegand DDS', '1-530-639-0787', '344 Eliane Streets Apt. 262\nSengerchester, AL 43733', 'bparisian@example.net', 0, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'x3DRGunoL9', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(5, 'Ms. Madalyn Green', '+1 (954) 559-5823', '351 Tess Forges\nZboncakchester, ND 94300-3842', 'ashlee57@example.com', 1, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'R1L0FrOi8P', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(6, 'Elenor Ortiz', '1-479-920-8361', '408 Gia Crescent\nWest Buddyhaven, NE 60593', 'sbayer@example.com', 1, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'mYWCg9MdVgu513ddtELeRXfbWnlHUrYpAqjtAsmTN9YgQALWOizqS4zVQybp', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(7, 'Dr. Cielo Farrell', '412-392-0648', '56959 Jayson Trace\nProsaccoburgh, MN 59268', 'hdeckow@example.com', 1, 1, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'RpbPg2MaFEurgurs8f3d0VffnnOU7zA1DF1DXOrtJeJZAmy3rZsYLozUYTgo', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(8, 'Dr. Mason Fritsch', '985-265-0500', '1797 Dickens Cliffs Apt. 095\nSouth Laurenmouth, WI 94035', 'uhoppe@example.net', 0, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'fRRepWIVDc', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(9, 'Mr. Emanuel Farrell Sr.', '+1 (718) 746-4293', '75856 Little River\nLake Martin, FL 20335-7531', 'hrogahn@example.net', 1, 1, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'gRRoedu91o', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(10, 'Prof. Susana Johnston', '1-424-759-5932', '496 Alba Camp\nBayerchester, NJ 17686', 'bechtelar.viva@example.com', 1, 0, '2023-05-15 07:44:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'VHT2hnpHFh', '2023-05-15 07:44:56', '2023-05-15 07:44:56'),
(12, 'Nguyễn Văn A', '0855665509', 'Hồ Chí Minh', 'nguyenvana@gmail.com', 0, 1, NULL, '$2y$10$NjoG3gMvNUmWnQd.R28mZOgn5nokOcjniOK5kRTjPl6IBO0kUAANu', NULL, '6JMO74Kh554gJgaDXQXT4MfjQAzCwwF8T2qIQM8Rz29NiAWKTCSI0lRbIrMr', '2023-05-19 03:49:03', '2023-06-03 04:50:17'),
(14, 'Nguyễn Trung Hậu', '0855665509', 'Hồ Chí Minh', '51900067@student.tdtu.edu.vn', 1, 0, NULL, '$2y$10$HDNxcK8NkHvEadeLLjvHDO7JV6YHvea.snW5JImaUNM/0xCZxAuC2', NULL, NULL, '2023-05-28 02:08:14', '2023-06-03 05:36:29'),
(15, 'Tô Tấn Bửu', '123456', NULL, 'acnast9@gmail.com', 1, 0, NULL, '$2y$10$tVU/a30qZ4UdLU6v.4ZIJOuiOH4/pQatIO.EHYlrTE0VHvNqXPFbC', NULL, NULL, '2023-05-29 10:24:13', '2023-05-29 11:51:55'),
(16, 'Trần Văn B', '0855665509', 'Việt Nam', 'tranvanb@gmail.com', 1, 1, NULL, '$2y$10$NjoG3gMvNUmWnQd.R28mZOgn5nokOcjniOK5kRTjPl6IBO0kUAANu', NULL, NULL, '2023-05-31 08:18:28', '2023-06-03 06:44:21'),
(19, 'Hậu Trung', '0855665509', NULL, 'trunghau280301@gmail.com', 1, 0, NULL, '$2y$10$kfbZAcOXCLZ2wXubxJ46X.JAlGnljxQQNw5gQO1JXBR/PgVsw61sW', NULL, NULL, '2023-06-02 08:09:52', '2023-06-03 06:52:07'),
(20, 'Han', '0855665509', NULL, 'giahanledao@gmail.com', 1, 0, NULL, '$2y$10$UHaWoSlS3npXcVoe.t/2AOztakwPMvheJPMYPmcaR7JVLb/UkByTC', NULL, NULL, '2023-06-03 05:06:07', '2023-06-03 05:19:58'),
(21, 'Luân', '0855665509', '1123457 HCM', 'vuluan5091@gmail.com', 0, 0, NULL, '$2y$10$sTkYOreFPunL1ep7w0048OQAPE1ELyVJfQLcoExPuVspIuDlpPACe', NULL, 'UwOIsTnDZVmEmhCfZAgittvOcqS4QOwA81yfCO05zRyRsMoRQ34ahLpRLuuh', '2023-06-03 05:49:36', '2023-06-03 06:51:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_information`
--

CREATE TABLE `web_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_img` varchar(255) DEFAULT NULL,
  `web_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'test@gmail.com',
  `facebook_link` varchar(255) DEFAULT NULL,
  `gg_map_link` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `web_information`
--

INSERT INTO `web_information` (`id`, `logo_img`, `web_name`, `address`, `phone`, `email`, `facebook_link`, `gg_map_link`, `created_at`, `updated_at`) VALUES
(1, '64699ee656d0b_646910e955c4e_unnamed.png', 'Hải Châu 1', '189 Trần Hưng Đạo, Mỹ Bình, Long Xuyên, An Giang', '0855665509', 'trunghau280301@gmail.com', 'https://www.facebook.com/profile.php?id=100006927306841', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0235250908268!2d106.69489867768691!3d10.732668862116743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2sTon%20Duc%20Thang%20University!5e0!3m2!1sen!2sus!4v1684606850953!5m2!1sen!2sus', '2023-05-20 10:54:28', '2023-05-20 22:00:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 19, 18, '2023-06-02 11:18:35', '2023-06-02 11:18:35'),
(19, 16, 14, '2023-06-02 11:27:28', '2023-06-02 11:27:28'),
(20, 16, 12, '2023-06-02 11:28:24', '2023-06-02 11:28:24'),
(21, 16, 18, '2023-06-02 11:29:05', '2023-06-02 11:29:05'),
(22, 12, 12, '2023-06-02 11:29:37', '2023-06-02 11:29:37'),
(23, 14, 14, '2023-06-02 13:12:40', '2023-06-02 13:12:40'),
(24, 14, 3, '2023-06-02 13:12:51', '2023-06-02 13:12:51'),
(25, 14, 12, '2023-06-02 15:35:35', '2023-06-02 15:35:35'),
(26, 20, 17, '2023-06-03 05:19:15', '2023-06-03 05:19:15'),
(27, 20, 13, '2023-06-03 05:19:29', '2023-06-03 05:19:29'),
(28, 20, 11, '2023-06-03 05:19:37', '2023-06-03 05:19:37');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_article_category_id_foreign` (`article_category_id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_color_id_foreign` (`color_id`),
  ADD KEY `order_items_size_id_foreign` (`size_id`);

--
-- Chỉ mục cho bảng `order_payment_methods`
--
ALTER TABLE `order_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payment_methods_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_categories_id_foreign` (`product_categories_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Chỉ mục cho bảng `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_urls_url_key_unique` (`url_key`);

--
-- Chỉ mục cho bảng `short_url_visits`
--
ALTER TABLE `short_url_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `short_url_visits_short_url_id_foreign` (`short_url_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `web_information`
--
ALTER TABLE `web_information`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `order_payment_methods`
--
ALTER TABLE `order_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `short_url_visits`
--
ALTER TABLE `short_url_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `web_information`
--
ALTER TABLE `web_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_items_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `order_payment_methods`
--
ALTER TABLE `order_payment_methods`
  ADD CONSTRAINT `order_payment_methods_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_categories_id_foreign` FOREIGN KEY (`product_categories_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `short_url_visits`
--
ALTER TABLE `short_url_visits`
  ADD CONSTRAINT `short_url_visits_short_url_id_foreign` FOREIGN KEY (`short_url_id`) REFERENCES `short_urls` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
