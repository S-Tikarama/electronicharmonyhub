-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 03:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadget_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `feedback` text DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `g_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `uname`, `feedback`, `rating`, `g_id`, `created_at`, `status`) VALUES
(13, 'Raj Pote', 'good', '4.50', 1, '2023-10-02 10:45:42', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `gadget_details`
--

CREATE TABLE `gadget_details` (
  `g_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pricerange` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `gdis` varchar(3000) NOT NULL,
  `gspecification` varchar(1000) NOT NULL,
  `gimage` varchar(100) NOT NULL,
  `imageone` varchar(200) NOT NULL,
  `imagetwo` varchar(200) NOT NULL,
  `glink` varchar(100) NOT NULL,
  `gprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gadget_details`
--

INSERT INTO `gadget_details` (`g_id`, `type`, `pricerange`, `category`, `gname`, `gdis`, `gspecification`, `gimage`, `imageone`, `imagetwo`, `glink`, `gprice`) VALUES
(1, 'phone', '100000-150000', 'bestbuy', 'Samsung galaxy s23 ', 'Samsung Galaxy S23 surprised me with its improved battery life compared to its predecessors. The switch from Exynos to Qualcomm Snapdragon 8 Gen 2 chipset raised my hopes, and it delivered on the promise of better energy efficiency. The compact design of the S23 is a refreshing change, catering to users with smaller hands. The device is comfortable to hold and comes in various appealing colors, including a standout green variant. Samsung\'s commitment to environmental sustainability is evident with the incorporation of recycled materials in the phone\'s construction.\r\n\r\nThe One UI 5.1 interface offers familiar refinements and additional automation features, but some Samsung characteristics like redundant apps and occasional glitches remain. The 6.1-inch AMOLED display provides stunning visuals with deep blacks and accurate colors. Its peak brightness of approximately 2000 nits ensures clear visibility even in bright sunlight. The S23 also features a decent stereo speaker setup with Dolby Atmos support.\r\n\r\nPowered by the Snapdragon 8 Gen 2 chipset, the Galaxy S23 delivers excellent performance and energy efficiency. Gaming performance is impressive, maintaining stable frame rates even at maximum settings. However, the compact display size may lead to accidental taps during intense gaming sessions.\r\n\r\nThe battery life of the Galaxy S23 is a standout feature, easily lasting a full day with moderate to heavy usage. Despite the slightly larger 3900mAh battery, the switch to the Snapdragon platform improves efficiency. Recharging speed is not exceptional, but wireless charging is supported.\r\n\r\nThe camera hardware remains largely unchanged from the previous generation. The primary 50MP sensor captures detailed photos in daylight, but low-light photography suffers with softer images and color inconsistencies. The selfie camera sees a slight improvement with a 12MP sensor. Video recording capabilities impress with 8K resolution and stabilization.\r\n\r\nIn summary, the Samsung Galaxy S23 is an impressive compact smartphone option, especially for users who prefer smaller devices. The switch to the Snapdragon chipset delivers better battery life. Although it comes at a high price, the overall experience is satisfying, with a few minor issues that can be addressed through future updates. The device promises regular software updates to enhance the user experience.', 'DEVICE:Samsung galaxy s23\r\nNETWORK: GSM/CDMA/HSPA/EVDO/LTE/5G\r\nBODY: 146.3 x 70.9 x 7.6 mm, 168 g, Glass front, glass back, IP68 dust/water resistant\r\nDISPLAY: Dynamic AMOLED 2X, 6.1 inches, 1080 x 2340 pixels\r\nPLATFORM: Android 13, One UI 5.1, Qualcomm Snapdragon 8 Gen 2, Octa-core\r\nMEMORY: 128GB/256GB/512GB 8GB RAM\r\nCAMERA: Triple main camera: 50 MP (wide), 10 MP (telephoto), 12 MP (ultrawide), Single selfie camera: 12 MP (wide)\r\nSOUND: Loudspeaker, Tuned by AKG\r\nCOMMS: Wi-Fi, Bluetooth, GPS, NFC, USB Type-C\r\nFEATURES: Fingerprint sensor, Samsung DeX, Bixby, Samsung Pay\r\nBATTERY: Li-Ion 3900 mAh, 25W wired charging, 15W wireless charging, 4.5W reverse wireless charging\r\nColors: Phantom Black, Cream, Green, Lavender, Graphite, Lime, \r\nPrice:127999', 'samsung-galaxy-s23-5g-1.jpg', 'galaxy-s23-on-inceleme-010223-2.jpg', 'samsung-galaxy-s23-5g-1.jpg', 'https://hukut.com/samsung-galaxy-s23-price-nepal', '127999'),
(2, 'phone', '100000-150000', 'bestbuy', 'iphone 14', 'The iPhone 14 is Apple\'s latest addition, but it doesn\'t bring many changes compared to last year\'s model. While the Pro models have more features, the vanilla iPhone 14 holds its own. The design remains unchanged, with premium materials and IP68 water resistance, but it lacks the Pro models\' upgraded selfie cutout and always-on display.\r\n\r\nThe 6.1-inch OLED display is sharp and colorful, but the 60Hz refresh rate feels slightly choppy compared to other phones in its price range. The stereo speakers provide excellent sound quality.\r\n\r\nPerformance-wise, the iPhone 14 runs on the Apple A15 Bionic chip with 5 cores, delivering benchmark performance similar to last year\'s iPhone 13 Pro. It manages thermal control well, avoiding sudden performance drops.\r\n\r\nBattery life is decent, with a 3279mAh capacity and a 90-hour endurance rating. However, the charger is not included.\r\n\r\niOS 16 brings refinements such as lock screen customization and improved app functionality. The cameras, including the 12MP main and ultra-wide lenses, capture great photos with detail and natural colors. Low-light performance is impressive, and the 12MP selfie camera with autofocus takes excellent selfies.\r\n\r\nIn summary, the iPhone 14 offers a compact form factor and the expected high quality of an iPhone. While it\'s more of a refresh than a major upgrade, it\'s still a great phone. If you\'re looking to save money, the iPhone 13 is a viable option with similar features.', 'DEVICE:iPhone 14\r\nNETWORK: GSM/CDMA/HSPA/EVDO/LTE/5G\r\nBODY: 146.7 x 71.5 x 7.8 mm, 172 g, Glass front, glass back, aluminum frame, IP68 dust/water resistant\r\nDISPLAY: Super Retina XDR OLED, 6.1 inches, 1170 x 2532 pixels\r\nPLATFORM: iOS 16, Apple A15 Bionic (5 nm), Hexa-core, Apple GPU\r\nMEMORY: 128GB 6GB RAM, 256GB 6GB RAM, 512GB 6GB RAM\r\nCAMERA: Dual main camera: 12 MP (wide), 12 MP (ultrawide), Single selfie camera: 12 MP (wide)\r\nSOUND: Loudspeaker, No 3.5mm jack\r\nFEATURES: Face ID, accelerometer, gyro, proximity, compass, barometer, Ultra Wideband (UWB) support, Emergency SOS via satellite\r\nBATTERY: Li-Ion 3279 mAh, Wired and wireless charging options available\r\nCOLOR: Midnight, Purple, Starlight, Blue.\r\nPRICE:127999', 'iphone 14.jpg', 'iphone 14cover.jpg', 'iphone 14.jpg', 'https://www.daraz.com.np/catalog/?q=iphone+14&_keyori=ss&from=input&spm=a2a0e.11779170.search.go.287', '138990'),
(3, 'laptop', '50000-100000', 'deals', 'Acer Aspire 5 2022 ', 'The Acer Aspire 5 2022 is an affordable laptop with a 12th gen Intel CPU, suitable for students and beginners. Let\'s discuss its key aspects.\r\n\r\nDesign:\r\nThe laptop has a basic design with a plastic chassis and an aluminum lid. While the build quality feels a bit clumsy for a budget laptop, it\'s manageable. The keyboard deck has some flex, but typing experience is not significantly affected. The keys feel mushy, and there\'s no backlighting. However, it does include a dedicated numpad, and the trackpad is responsive.\r\n\r\nDisplay:\r\nThe laptop features a 15.6-inch screen with average quality. It\'s sufficient for tasks like document editing and indoor video streaming, but it\'s not the brightest or most vibrant panel. Graphic designers may want to consider a laptop with better color coverage. The 16:9 aspect ratio and thick bezels may not be ideal for programmers or avid readers. The webcam and downward-firing speakers are decent, but the speakers could be louder.\r\n\r\nPerformance:\r\nThe highlight of the Aspire 5 2022 is its performance, thanks to the 12th gen Intel CPU. It outperforms the previous generation by a wide margin in benchmarks, offering a significant boost in both single-core and multi-core scores. In real-life usage, it handles regular office tasks, multitasking, and light editing in Photoshop smoothly. However, for serious coding, upgrading the RAM to 16GB is recommended.\r\n\r\nGaming:\r\nWhile not a dedicated gaming laptop, the Aspire 5 can handle lightweight games at low settings. With a laptop cooler, it achieves decent frame rates in games like CS:GO, Valorant, and FIFA 22. For a better gaming experience, the Aspire 5 Gaming model with a 12th gen Intel CPU and an RTX 2050 GPU is a viable option.\r\n\r\nBattery Life:\r\nThe laptop comes with a 50 watt-hour battery that lasts around 5 hours on average. It charges with a traditional 65-watt round pin charger, but a more compact 65-watt power delivery charger can be used if you have a Thunderbolt 4 port.\r\n\r\nConclusion:\r\nThe Acer Aspire 5 2022 is a recommended option for budget-conscious students or beginners. The 12th gen Intel CPU provides significant performance gains, and it offers rare features like Thunderbolt 4 and Wi-Fi 6e in its price range. The design and build quality are basic, and the display could be better. If a more robust build and a great screen are prioritized, considering last year\'s models at a discounted rate might be worth exploring, although you would miss out on the 12th gen power.', 'Brand: Acer\r\nSeries: Aspire Series\r\nCPU: Intel Core i5-1235U (12 MB Smart Cache, 1.3 GHz up to 4.4 GHz)\r\nOperating System: Windows 11 Genuine\r\nScreen: 15.6-inch IPS display; Full-HD (1920 X 1080 pixels) resolution; IPS (In-Plane Switching) technology\r\nType: Affordable budget laptop\r\nRAM: 8GB DDR4 RAM (upgradable to 32 GB using two SODIMM modules)\r\nHard Drive: 512GB SSD\r\nGraphics Coprocessor: Intel Iris X Graphics\r\nWireless: Intel Wireless Wi-Fi 6E60, Bluetooth 5.1\r\nExtensions: HDMI (1), USB 3.2 Gen 1 Type-A Ports (3), USB 3.2 Gen 2 Type-C Ports (1), USB Type-C, Network (RJ-45), Headphone/Microphone Combo Port\r\nComputer Memory: DDR4 SDRAM\r\nBatteries: 48Whr\r\nWeight: 1.65 kg\r\nPrice: Rs. 83,000 (i5 Variant) in Nepal', 'acer_12_gen_2_1.jpeg', 'images.jpg', 'acer_12_gen_3_1.jpeg', 'https://itti.com.np/acer-aspire-5-2022-price-nepal', '83000'),
(4, 'laptop', '50000-100000', 'deals', 'Asus VivoBook Go E1404', 'The ASUS Vivobook Go 14 (E1404) is a mid-budget laptop priced at Rs 42,990, designed to cater to a wide variety of users. It offers solid performance with an AMD Ryzen 7000 Series Mobile Processor, LPDDR5 memory, and up to 512GB SSD storage. During our testing, we found it more than sufficient for daily tasks, including handling multiple browsers and tabs. The laptop comes in two variants, Ryzen 5 7520U and Ryzen 3 7320U, both powered by the latest AMD Ryzen 7020 family of processors. It also features AMD Radeon graphics, suitable for casual gaming and photo/video editing. However, there are a few software glitches, such as occasional lockouts after sleep mode, which can be resolved by opening the task manager.\r\n\r\nIn terms of design, the Vivobook Go 14 (E1404) primarily uses plastic, making it lightweight. ASUS has done a good job of providing a metal-like finish on the top shell, which is both fingerprint resistant and smooth to the touch. The laptop meets US military standards and offers a minor flex in the screen, surpassing its competitors in this price segment. It includes a 180-degree lay-flat hinge and a physical webcam shield for added functionality and privacy.\r\n\r\nThe laptop features a 14.0-inch FHD IPS display with a 60Hz refresh rate, 250 nits of brightness, and a 45% NTSC color gamut. While the display is decent for indoor work, it lacks vibrant colors. ASUS has also launched an OLED version of the Vivobook, offering punchier colors at a slightly higher price. The anti-glare display and slim bezels contribute to a compact footprint. It is available in three color options: Cool Silver, Mixed Black, and Grey Green.\r\n\r\nThe ASUS Vivobook Go 14 (E1404) includes several useful features such as a virtual NumberPad 2.0 on the touchpad, AI Noise canceling technology for clearer calls, and a lifetime subscription to Microsoft Office Home and Student 2021. It also provides an HD webcam with a physical privacy shutter and offers various connectivity options, including USB 3.2 Gen 1 (Type-C), USB 3.2 Gen 1, USB 2.0, HDMI 1.4, and a 3.5mm combo audio jack. However, the Type-C port cannot be used for charging the laptop. MyASUS is pre-installed for system-wide customization and diagnostics.\r\n\r\nWhile the laptop has a few drawbacks, such as the lack of a backlit keyboard and permanent numbers on the touchpad, these are not deal-breakers considering the price segment. The occasional glitches on the password-entering page can be resolved by pressing Ctrl+Alt+Delete and may be fixed in future updates.\r\n\r\nOverall, the ASUS Vivobook Go 14 (E1404) offers a good price-to-performance ratio and is a decent choice for those on a budget, with its solid performance and competitive features.', 'Brand: Asus\r\nSeries: VivoBook Series\r\nModel: Asus VivoBook Go E1404\r\nType: Budget Notebook\r\nProcessor: AMD Ryzen™ 5 7520U Mobile Processor (4-core/8-thread, 4MB cache, up to 4.3 GHz max boost)\r\nGraphics: AMD Radeon™ Graphics\r\nRAM: 8GB LPDDR5 on board\r\nDisplay: 14-inch IPS-level Panel, LED Backlit, FHD (1920 x 1080) resolution, 16:9 aspect ratio, 250nits brightness, 45% NTSC color gamut for non-OLED, Anti-glare display, Screen-to-body ratio: 82%\r\nConnections: 1x USB 2.0 Type-A, 1x USB 3.2 Gen 1 Type-A, 1x USB 3.2 Gen 1 Type-C, 1x HDMI 1.4, 1x 3.5mm Combo Audio Jack, 1x DC-in\r\nNetworking: Wi-Fi 5(802.11ac) (Dual band) 1*1, Bluetooth® 5.1 Wireless Card\r\nStorage: 512GB SSD\r\nSize (Height x Width x Depth): 32.45 x 21.39 x 1.79 ~ 1.79 cm (12.78\" x 8.42\" x 0.70\" ~ 0.70\")\r\nBattery: 42WHrs, 3S1P, 3-cell Li-ion\r\nWebcam: 720p\r\nWeight: 1.38 Kg\r\nKeyboard and Touchpad: Chiclet Keyboard with 1.4mm Key-travel, Precision Touchpad with support for NumberPad\r\nAsus VivoBook Go E1404 2023 Price in Nepal: Rs', 'asus_vivobook_go_e1404_3.png', 'images.jpg', 'asus_vivobook_go_e1404_3.png', 'https://itti.com.np/asus-vivobook-go-2023-e1404-price-nepal', '76000'),
(5, 'accessories', '1000-10000', 'deals', 'Reddragon K599', '\"Hey, it\'s Gadget Search! Today, I\'m reviewing the Red Dragon K599 keyboard. The unboxing revealed a solid build, with a plastic top, metal plate, and recessed keys. The typing experience with Red Outtemu switches is excellent. It\'s a wireless keyboard with a 2.4 GHz USB dongle and good range. Battery life is decent, and the RGB lighting offers various modes. It\'s splash-resistant, has flip-up risers, and supports hot swapping with Outtemu switches. The only downside is the white secondary function printing. Overall, it\'s a great keyboard at $53. I\'ll be adding custom keycaps for a perfect setup. Leave your feedback if you found this review helpful.\"', 'connection:wired/wireless(2.4Ghz)\r\nhot swap-able: yes(3-pin)\r\nbattery: 1600mh\r\nRgb:yes(18 different ighting modes)', 'k5992.png', 'k5991.jpg', 'k599.jpg', 'https://redragonepal.com/product/redragon-deimos-k599-2-4gwired-mechanical-keyboard/', '6499'),
(6, 'accessories', '1000-10000', 'deals', 'Redragon M991', '\"Hello everyone, it\'s gadgetsearch, and today I want to introduce you to the Red Dragon M991 wireless gaming mouse, also known as Enlightenment. This mouse offers a great user experience and comes with convenient features.\r\n\r\nThe package includes the mouse itself, a charging wire (though it\'s not necessary for use), a dongle for wireless connection, a Red Dragon sticker, and a manual with detailed instructions. The mouse has a sleek design with buttons for DPI and polling rate adjustment, a scroll wheel that doubles as a button, and a comfortable thumb rest. It also has a charging port for wired use.\r\n\r\nOn the bottom of the mouse, you\'ll find a storage space for the dongle, five pads for smooth movement, a mode switch for lighting options, and an eco mode that conserves power by automatically turning off the lights after a certain time of inactivity. The mouse\'s lighting effects can be customized using the Redragon Pro driver, allowing you to personalize it to match your gaming setup.\r\n\r\nIn terms of performance, the mouse is slightly heavier compared to others, which can be advantageous for precise movements in games like Valorant. The DPI and polling rate can be adjusted for increased accuracy. While it may take some time to get used to the weight and sensitivity, you\'ll likely notice improvements in your game-play, particularly in head shot accuracy.\r\n\r\nIf you have any questions about the mouse, feel free to leave a comment, and I\'ll do my best to provide answers. ', 'connection:wired/wireless(2.4Ghz)\r\nbattery: 45 hrs battery capacity\r\nRgb:yes\r\n9 Macro Buttons', 'reddragonmouse2.png', 'reddragonmouse1.jpg', 'reddragonmouse.jpg', 'https://redragonepal.com/product/redragon-m991-wired-wireless-gaming-mouse-19000-dpi/', '5498'),
(7, 'phone', '10000-50000', 'bestbuy', ' Redmi Note 12 5G', 'Introducing the Xiaomi Redmi Note 12 5G: an affordable mid-range smartphone with impressive 5G capabilities. In this comprehensive review, we\'ll explore its design, display, performance, camera quality, and more to help you determine if it\'s worth your investment.\r\n\r\nDesign-wise, the Redmi Note 12 5G boasts a sleek and lightweight build, featuring a frosted finish on its plastic back and a curved frame. It\'s not just stylish but also IP53 certified for water and dust resistance, ensuring durability and peace of mind.\r\n\r\nThe device sports a stunning 6.67-inch AMOLED display with a crisp 1080p resolution and a buttery smooth 120Hz refresh rate. Expect sharp visuals, vibrant colors, and excellent brightness reaching up to 450 nits. Whether you\'re streaming videos or browsing content, the immersive viewing experience is a delight.\r\n\r\nWhile the Redmi Note 12 5G offers a single speaker, the audio quality remains decent. It delivers clear sound with balanced mids and highs, though bass enthusiasts may find it slightly lacking. Nevertheless, it\'s still enjoyable for everyday use.\r\n\r\nUnlocking your device is a breeze with the conveniently located side-mounted fingerprint scanner. Additionally, storage won\'t be an issue, thanks to the available options of 128GB or 256GB, expandable via a microSD card.\r\n\r\nOperating on the latest Android 12 with MIUI 14, the Redmi Note 12 5G ensures a smooth and optimized user experience. Expect improved performance and access to a host of new features, with the promise of future updates to enhance your overall smartphone usage.\r\n\r\nUnder the hood, the Snapdragon 4 Gen 1 chipset powers the Redmi Note 12 5G, providing capable performance and seamless 5G connectivity. While it may not outshine some competitors, it offers a solid day-to-day experience and handles casual gaming with ease.\r\n\r\nThe device is equipped with a capable camera setup, including a 48MP main camera, an 8MP ultrawide lens, and a 2MP macro camera. In well-lit conditions, the main camera impresses with its ability to capture detailed photos with accurate colors and balanced dynamic range. While low-light photography is a slight weakness, enabling night mode significantly improves the quality, albeit sacrificing some fine details. The ultrawide lens performs adequately but falls short in low-light scenarios.\r\n\r\nSelfie enthusiasts will appreciate the 13MP front camera, which produces satisfactory results in good lighting conditions. However, inconsistency is observed in challenging lighting environments, leading to occasionally blurry or soft images.\r\n\r\nWhen it comes to video recording, the Redmi Note 12 5G supports up to 1080p resolution with electronic stabilization. Videos from the main camera exhibit decent quality, while those from the ultrawide lens may lack detail and show some noise.\r\n\r\nIn conclusion, the Xiaomi Redmi Note 12 5G offers a compelling package with its impressive 120Hz OLED display, powerful 5G capabilities, and fast charging support. Howeve', 'NETWORK	Technology	GSM / HSPA / LTE / 5G\r\nLAUNCH	Announced: 2022, October 27\r\nStatus: Available. Released 2023, January 11\r\n\r\nBODY	\r\nDimensions: 165.9 x 76.2 x 8 mm (6.53 x 3.00 x 0.31 in)\r\nWeight: 188 g (6.63 oz)\r\nSIM: Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP53 dust and splash resistant\r\n\r\nDISPLAY	\r\nType: AMOLED, 120Hz, 1200 nits (peak)\r\nSize: 6.67 inches, 107.4 cm2 (~85.0% screen-to-body ratio)\r\nResolution: 1080 x 2400 pixels, 20:9 ratio (~395 ppi density)\r\nProtection: Corning Gorilla Glass 3\r\n\r\nPLATFORM	\r\nOS: Android 12, MIUI 14 (International), MIUI 13 (India)\r\nChipset: Qualcomm SM4375 Snapdragon 4 Gen 1 (6 nm)\r\nCPU: Octa-core (2x2.0 GHz Cortex-A78 & 6x1.8 GHz Cortex-A55)\r\nGPU: Adreno 619\r\n\r\nMEMORY \r\nCard slot: microSDXC (uses shared SIM slot)\r\nInternal: 128GB 4GB RAM, 128GB 6GB RAM, 256GB 8GB RAM\r\nUFS 2.2\r\n\r\nMAIN CAMERA	\r\nTriple:\r\n- 48 MP, f/1.8, (wide), PDAF\r\n- 8 MP, f/2.2, 120˚ (ultrawide), 1/4\", 1.12µm\r\n- 2 MP, f/2.4, (macro)\r\nFeatures: Dual-LED dual-tone flash, HDR, panor', 'redmi note 12.png', 'redminote123.jpg', 'redminaote12 1.png', 'https://www.daraz.com.np/products/redmi-note-12-5g-8256-gb-667-amoled-dotdisplay-120hz-refresh-rate-', '31999'),
(8, 'phone', '50000-100000', 'deals', 'Samsung Galaxy A34', 'The Samsung Galaxy A34 is a solid mid-range smartphone that offers excellent value for money. Its sleek and consistent design, including the matte plastic back, gives it a premium look. The phone is durable with Gorilla Glass protection and has an IP67 rating for water and dust resistance.\r\n\r\nThe display is a standout feature, with an AMOLED panel and a U-shaped notch. It offers Full HD+ resolution and a 120Hz refresh rate, providing stunning details and smooth scrolling. The vibrant colors and high brightness make it usable even in direct sunlight.\r\n\r\nSamsung\'s One UI 511, based on Android 13, offers an intuitive and visually stunning user interface. The software is optimized for larger screens and includes practical features like one-handed mode and fun features like AR Emoji.\r\n\r\nPowered by the MediaTek Dimensity 9000 processor, the Galaxy A34 delivers snappy performance for multitasking and everyday use. With 6GB of RAM and 128GB of storage, it handles web browsing, video streaming, and running multiple applications smoothly. Gaming performance is also solid.\r\n\r\nThe camera system consists of a 48MP main camera, an 8MP ultra-wide camera, and a 5MP macro lens. Photos have good color and detail, especially in portrait mode. Video recording is satisfactory, though exposure can be inconsistent.\r\n\r\nThe phone offers impressive battery life, lasting a full day on average. It supports 25W fast charging, but the charger is not included.\r\n\r\nOverall, the Samsung Galaxy A34 is a compelling choice for a mid-range smartphone, offering great features, performance, and battery life at an affordable price.', 'NETWORK: GSM / HSPA / LTE / 5G\r\nBODY\r\nDimensions: 161.3 x 78.1 x 8.2 mm (6.35 x 3.07 x 0.32 in)\r\nWeight: 199 g (7.02 oz)\r\nBuild: Glass front (Gorilla Glass 5)\r\nDISPLAY: Super AMOLED, 120Hz, 1080 x 2340 pixels, 19.5:9 ratio\r\nPLATFORM\r\nOS: Android 13, One UI 5.1\r\nChipset: Mediatek MT6877V Dimensity 1080 (6 nm)\r\nCPU: Octa-core (2x2.6 GHz Cortex-A78 & 6x2.0 GHz Cortex-A55)\r\nGPU: Mali-G68 MC4\r\nCard slot: microSDXC (uses shared SIM slot)\r\nInternal: 128GB 8GB RAM\r\nCAMERA\r\nTriple: 48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF, OIS\r\n8 MP, f/2.2, 123˚, (ultrawide)\r\n5 MP, f/2.4, (macro)\r\nFeatures: LED flash, panorama, HDR\r\nVideo: 4K@30fps, 1080p@30/60fps, 720p@480fps\r\nselfie: 13 MP, f/2.2, (wide), 1/3.1\", 1.12µm\r\nVideo: 4K@30fps, 1080p@30fps\r\n\r\nLoudspeaker: Yes, with stereo speakers\r\n3.5mm jack: No\r\nWLAN: Wi-Fi 802.11 a/b/g/n/ac, dual-band\r\nBluetooth: 5.3, A2DP, LE\r\nSensors: Fingerprint \r\nbattery: Li-Po 5000 mAh, non-removable', 'samsung a341.png', 'samsunga34.jpg', 'samsungga34.jpg', 'https://hukut.com/samsung-galaxy-a34-price-in-nepal', '42999'),
(9, 'phone', '50000-100000', 'deals', 'OnePlus Nord 3 5G', 'OnePlus recently introduced the Nord 3, an upgraded mid-range smartphone succeeding the Nord 2T. The device boasts a Misty Green colorway, a metallic frame, and a Gorilla Glass 5-protected glass back. It holds an IP54 rating for water and dust resistance.\r\n\r\nFeaturing a 120Hz AMOLED display, the Nord 3 delivers vibrant colors, high contrast, and HDR support. The screen\'s peak brightness ensures visibility even under sunlight.\r\n\r\nThe camera setup includes a 50MP main camera with OIS for sharp photos and stable shots. It can record 4K videos at 60fps. Additionally, an 8MP ultra-wide camera and a 2MP macro lens enhance the photography experience.\r\n\r\nPowered by a 4nm Dimensity 9000 processor, coupled with 16GB of LPDDR5X RAM and 256GB of UFS 3.1 storage, the Nord 3 offers seamless multitasking and fast file transfers.\r\n\r\nRunning OxygenOS 13 based on Android 13, the device guarantees up to three years of major Android upgrades and four years of security updates.\r\n\r\nWith a 5000mAh battery and 80W fast charging, the Nord 3 can reach a full charge in just 31 minutes.\r\n\r\nOnePlus also launched the OnePlus Buds 2R, affordable earbuds featuring a dual-mic system for clear calls, wind cancellation, enhanced bass, and seamless connectivity with OnePlus devices. The earbuds provide up to 8 hours of battery life, with the case extending it to over 30 hours.\r\n\r\nOverall, the OnePlus Nord 3 and OnePlus Buds 2R offer notable improvements, making them attractive choices in the mid-range smartphone and earbuds market.', '\r\nSize: 6.74 inches (17.12 centimeters)\r\nResolution: 2772 x 1240 pixels, 450 ppi\r\nScreen-to-body Ratio: 93.5%\r\nAspect Ratio: 20.1:9\r\nRefresh Rate: 40-120 Hz (dynamic)\r\nType: 120 Hz Super Fluid AMOLED\r\nTouch Response Rate: Up to 1000 Hz\r\nSupport: sRGB, Display P3, 10-bit Color Depth, HDR10+\r\nOperating System: OxygenOS 13.1 (based on Android™ 13)\r\nCPU: MediaTek Dimensity 9000\r\nGPU: Arm® Mali G710 MC10\r\nRAM and Storage: 16 GB RAM, 256 GB Storage\r\nBattery: 5000mAh (Dual-cell 2,500 mAh, non-removable) with 80W SUPERVOOC charging\r\nMain Camera Sensor: 50 MP Sony IMX890 + 8MP 112° Ultra-Wide Camera + 2 MP Macro Lens\r\nSensor: In-display Fingerprint Sensor.\r\nAudio: Dual Stereo Speakers with Dolby Atmos® support, Noise cancellation', 'oneplusn32.png', 'oneplusn3.jpg', 'oneplusnode3.png', 'https://www.daraz.com.np/products/oneplus-nord-3-5g-8gb-ram-and-128gb-rom-674-inch-fluid-amoled-120-', '69999');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phnumber` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `uname`, `password`, `cpassword`, `gender`, `phnumber`, `email`, `address`) VALUES
(13, 'Admin123', '$2y$10$e/CptM1GY6.Jca9XfnXpj.RA/I0q3lxnicFUY2RxF3t', '@dmin123', 'male', 9811897922, 'rrajpote@gmail.com', 'lalitpur'),
(40, 'Raj Pote', '$2y$10$4mJppZJJYqcjtQVnlVGZje0ELt/H8gfiZdn9wiQxNmh', 'Rajpote@123', 'male', 9811897922, 'rrajpote@gmail.com', 'banepa'),
(41, 'asdasda', '$2y$10$FPRQFJdxeShFWRW13dS02u6PLCIX.b/lkkp8mHIcMu3', 'Rashik@123', 'male', 9373827, 'asd@asdasdasdasd.com', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `gadget_details`
--
ALTER TABLE `gadget_details`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gadget_details`
--
ALTER TABLE `gadget_details`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `gadget_details` (`g_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
