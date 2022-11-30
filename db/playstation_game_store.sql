-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2022 pada 05.15
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playstation-game-store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`) VALUES
(11, 11, 1, 1),
(30, 19, 162, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` text NOT NULL,
  `date` varchar(128) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `id_user`, `id_product`, `date`, `quantity`, `total_price`, `status`) VALUES
(35, 19, '162', '11/30/2022-05:00:07', 3, 14997000, 'success'),
(36, 19, '128', '11/30/2022-05:02:17', 2, 3458000, 'success'),
(37, 19, '127', '11/30/2022-05:02:17', 4, 6796000, 'success'),
(38, 19, '132', '11/30/2022-05:02:17', 2, 1758000, 'success'),
(39, 19, '162', '11/30/2022-05:11:54', 4, 19996000, 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descriptions` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `descriptions`, `category`, `photo`) VALUES
(126, 'PlayStation 5 DualSense Wireless Controller', 729000, 10, 'Haptic feedback - Feel physically responsive feedback to your in-game actions with dual actuators which replace traditional rumble motors. In your hands, these dynamic vibrations can simulate the feeling of everything from environments to the recoil of different weapons.\r\nAdaptive triggers - Experience varying levels of force and tension as you interact with your in-game gear and environments. From pulling back an increasingly tight bowstring to hitting the brakes on a speeding car, feel physically connected to your on-screen actions.\r\nBuilt-in microphone and headset jack - Chat with friends online using the built-in microphone or by connecting a headset to the 3.5mm jack. Easily switch voice capture on and off at a moment’s notice with the dedicated mute button. Internet and account for PlayStation Network required.\r\nDualSense Controller PS5 and PC compatible. Not compatible with PS4.\r\nPS Remote Play requires Remote Play App connected to Wi-Fi, PS4 or PS5 console with the latest system software and compatible game. A PS4 or PS5 console with a wired connection via a LAN cable is recommended. Version 4.0 of the Remote Play App on iOS and iPadOS or version 4.1 on macOS is required for games to be playable with the controller over Bluetooth.\r\nDevices with macOS 11.3, iOS 14.5, iPadOS 14.5 or tvOS 14.5 or later supported.\r\nCable not included. To connect or charge the controller use the USB cable supplied with the PS5 console. Controllers sold separately.', 'Accessories', 'IMG_11132022_093808.jpg'),
(127, 'PlayStation PULSE 3D Wireless Headset – Midnight Black', 1699000, 5, 'Built for a new generation: Fine-tuned for 3D Audio on PS5 consoles; Enjoy comfortable gaming with refined earpads and headband strap. Available when feature is supported by game\r\nChat with friends through the hidden noise-cancelling microphones; Quickly adjust audio and chat settings with easy-access controls. Internet and account for PlayStation Network required\r\nTake your adventures further: Enjoy up to 12 hours wireless play with the built-in rechargeable battery; Easily connect to your PS5 or PS4 console using the wireless adaptor\r\nPulse 3D Wireless Headset PS5, PS4 and PC compatible.', 'Accessories', 'IMG_11132022_093815.jpg'),
(128, 'PlayStation PULSE 3D Wireless Headset - White', 1729000, 5, 'Built for a new generation - Fine-tuned for 3D Audio on PS5 consoles. Enjoy comfortable gaming with refined earpads and headband strap. Play in style with a sleek design that complements the PS5 console. Available when feature is supported by game.\r\nDesigned for gamers - Chat with friends through the hidden noise-cancelling microphones. Quickly adjust audio and chat settings with easy-access controls. Internet and account for PlayStation Network required.\r\nTake your adventures further - Enjoy up to 12 hours wireless play with the built-in rechargeable battery. Easily connect to your PS5 or PS4 console using the wireless adaptor. Connect to PS VR and mobile devices with the included audio cable. Built-in headset controls not supported on PS VR and mobile devices.\r\nPulse 3D Wireless Headset PS5, PS4 and PC compatible.Built for a new generation: Fine-tuned for 3D Audio on PS5 consoles; Enjoy comfortable gaming with refined earpads and headband strap. Available when feature is supported by game\r\nChat with friends through the hidden noise-cancelling microphones; Quickly adjust audio and chat settings with easy-access controls. Internet and account for PlayStation Network required\r\nTake your adventures further: Enjoy up to 12 hours wireless play with the built-in rechargeable battery; Easily connect to your PS5 or PS4 console using the wireless adaptor\r\nPulse 3D Wireless Headset PS5, PS4 and PC compatible.', 'Accessories', 'IMG_11132022_093824.jpg'),
(129, 'Marvel\'s Spider-Man: Miles Morales', 729000, 8, 'Miles morales discovers explosive powers that set him apart from his mentor, peter parker. Master his unique, bio-electric venom Blast attacks and covert camouflage power alongside spectacular web-slinging acrobatics, gadgets and skills.\r\nA war for control of Marvel\'s new York has broken out between a devious Energy Corporation and a high-tech criminal army. With his new home at the heart of the battle, miles must learn the cost of becoming a hero.\r\nTraverse the snowy streets of his new, vibrant and bustling Neighborhood as miles searches for a sense of belonging. When the lines blur between his personal and crime-fighting lives, he discovers who he can trust, and what it feels like to truly be home.', 'Games', 'IMG_11132022_093832.jpg'),
(130, 'Marvel\'s Spider-Man: Miles Morales Ultimate Edition', 1029000, 8, 'Miles morales discovers explosive powers that set him apart from his mentor, peter parker. Master his unique, bio-electric venom Blast attacks and covert camouflage power alongside spectacular web-slinging acrobatics, gadgets and skills.\r\nA war for control of Marvel\'s new York has broken out between a devious Energy Corporation and a high-tech criminal army. With his new home at the heart of the battle, miles must learn the cost of becoming a hero.\r\nTraverse the snowy streets of his new, vibrant and bustling Neighborhood as miles searches for a sense of belonging. When the lines blur between his personal and crime-fighting lives, he discovers who he can trust, and what it feels like to truly be home.', 'Games', 'IMG_11132022_094347.jpg'),
(131, 'Demon\'s Souls', 1029000, 6, 'Discover where the journey began - Experience the original brutal challenge, completely remade from the ground up. All presented in stunning visual quality with enhanced performance, this is the world of Boletaria as you have never seen it before.\r\nBecome the Slayer of Demons - Venture to the northern kingdom of Boletaria – a once prosperous land of knights, now beset with unspeakable creatures and ravenous demons. Meet strange characters, unhinged and twisted by the world around them, and unravel the unsettling story of Demon’s Souls.\r\nFace the world’s greatest warriors in ferocious PVP combat - With online invasions adding to the danger of your quest. Or play cooperatively by summoning allies to aid in your fight against the demons. Active PS Plus subscription required for online multiplayer.', 'Games', 'IMG_11132022_094400.jpg'),
(132, 'Sackboy: A Big Adventure', 879000, 10, 'Explore here, there and everywhere as you utilise Sackboy\'s cool, diverse move set to face a huge variety of thrilling challenges, fierce enemies and startling surprises\r\nTake on side splitting challenges in local and online* party play. Parties can play through the whole game including unmissable co op only levels.\r\nTempest 3D AudioTech Hear Craftworld come life all around you\r\nHaptic Feedback Running across wool like flooring or platforms will use haptics to simulate the change in material under Sackboy\r\nFast Loading Experience fast loading between and into levels, including in multiplayer* sessions with the PS5 console\'s ultra high speed SSD.Pre order to get a copy of the digital comic, The Gathering Storm, in which you will discover the mysterious past of Scarlet, Sackboy\'s mentor and Craftworld\'s last remaining Knitted Knight.', 'Games', 'IMG_11132022_094413.jpg'),
(133, 'Dualshock 4 Wireless Controller - Glacier White', 1029000, 4, 'The feel, shape, and sensitivity of the dual analog sticks and trigger buttons have been improved to provide a greater sense of control, No matter what you play\r\nThe dualshock 4 wireless Controller features a built-in speaker and stereo headset jack, putting several new audio options in the player\'s hands\r\nThe dualshock 4 wireless Controller can be easily recharged by plugging it into your PlayStation 4 system, even when in rest mode, or with any standard charger using a USB cable.', 'Accessories', 'IMG_11132022_094804.jpg'),
(134, 'PlayStation 5 Console - Disc Edition', 9999000, 8, 'Processor: AMD Zen 2, 8-core\r\nRAM: 16 GB GDDR6\r\nSSD: 825GB\r\nDisc drive: 4K Blu-ray\r\n\r\nThe PS5 continues to impress with its revolutionary controller, blazing-fast load times and exclusive games. It comes with a 4K Blu-ray drive, which gives you home-cinema bonuses - plus you can save money by trading disc-based games with your friends and at exchange shops.', 'Console', 'IMG_11132022_102833.png'),
(135, 'PlayStation 5 Console - Digital Edition', 8799000, 8, 'Processor: AMD Zen 2, 8-core\r\nRAM: 16 GB GDDR6\r\nSSD: 825GB\r\n\r\nThe cheaper PS5 Digital Edition is identical to the standard PS5 in terms of internal specs and performance. It\'s completely disc-less though: you can only buy games for it digitally and you miss out on the joys of 4K Blu-ray viewing. Still, it\'s a good choice for avid gamers without the cash for the top-tier PS5.', 'Console', 'IMG_11132022_103453.jpeg'),
(138, 'God of War: Ragnarok', 1029000, 10, 'Launch Edition includes in-game downloadable content Kratos Risen Snow Armor & Atreus Risen Snow Tunic (Cosmetic)\r\nFeel your journey through the Norse realms, made possible by immersive haptic feedback and adaptive trigger functionality.\r\nTake advantage of multidirectional 3D Audio; hear enemies approaching from any direction. (3D audio with stereo headphones (analog or USB))\r\nBask in the beautiful worlds you travel through, brought to life by precise art direction and arresting attention to detail.\r\nSwitch between full 4K resolution at a targeted 30 frames per second, or dynamic resolution upscaled to 4K at a targeted 60fps. (4K resolution requires a compatible 4K TV or display)', 'Games', 'IMG_11132022_103910.jpg'),
(139, 'Call of Duty: Modern Warfare II', 1029000, 10, 'Featuring the return of the iconic, team leader Captain John Price, the fearless John \"Soap\" MacTavish, the seasoned Sergeant Kyle \"Gaz” Garrick, and the lone wolf himself, fan favorite Simon “Ghost” Riley, players will witness what makes Task Force 141 the legendary squad it is today.', 'Games', 'IMG_11132022_104003.jpg'),
(140, 'Gran Turismo 7 Standard Edition', 1029000, 10, 'With the return of classic cars, iconic tracks, and fan-favourite modes like GT Simulation and Sport Mode - Gran Turismo 7 is the complete Real Driving Simulator, 25 years in the making.\r\nFind your line. Whether you\'re a racer, collector, tuner, designer, photographer or arcade fan - immerse yourself in the facets of automotive culture that matter most to you.\r\nConnect and compete. Join an international community of drivers to share race strategies, tuning tips, livery designs and photos, before taking to the track to go head-to-head.', 'Games', 'IMG_11132022_104100.jpg'),
(141, 'NBA 2K23', 1029000, 10, 'The next evolution of ultra-real gameplay has arrived on New Gen with NBA 2K23\r\nThe City is yours for the taking in the most immersive MyCAREER journey to date.\r\nStep back in time with era-specific visuals that captured Michael Jordan’s ascent from collegiate sensation to global icon with immersive Jordan Challenges chronicling his career-defining dominance.\r\nBall without limits as you collect and assemble a bevy of legendary talent from any era in MyTEAM.', 'Games', 'IMG_11132022_104151.jpg'),
(142, 'FIFA 23', 999000, 20, 'EA SPORTS FIFA 23 brings even more of the action and realism of football to the pitch in The World’s Game\r\nHyperMotion2 Technology creates more true football animation than ever before in every match\r\nPlay the biggest tournaments in football with both the men’s and women’s FIFA World Cup\r\nBuild your dream squad in FIFA Ultimate Team with FUT Moments and a revamped Chemistry system\r\nExperience The World’s Game with over 19,000 players, 700+ teams, 100+ stadiums, and over 30 leagues', 'Games', 'IMG_11132022_104332.jpg'),
(143, 'Dying Light 2 Stay Human', 499000, 10, 'Vast open world: participate in the life of a city engulfed in a new dark era. Discover different paths and hidden passages, as you explore its multiple levels and locations\r\nCreative & brutal combat: Take advantage of your parkour skills to tip the scales of even the most brutal encounter. Clever thinking, traps and creative weapons will be your best friends\r\nDay and night cycle: wait for night to venture into dark hideouts of the infected. Sunlight keeps them at Bay, but once it\'s gone, monsters begin the hunt, leaving their lairs Free to explore\r\nChoices & consequences: shape the future of the city with your actions and watch how it changes. Determine the balance of power by making choices in a growing conflict and forge your own experience', 'Games', 'IMG_11132022_104520.jpg'),
(144, 'Grand Theft Auto V', 429000, 20, 'STUNNING VISUALS: Enhanced levels of fidelity and performance with new graphics modes featuring up to 4K resolution, up to 60 frames per second, HDR options, ray tracing, improved texture quality, and\r\nFASTER LOADING: Quicker access to the action as the world of Los Santos and Blaine County load in faster than ever before\r\nADAPTIVE TRIGGERS AND HAPTIC FEEDBACK: Feel every moment through the DualSense controller, from directional damage to weather effects, rough road surfaces to explosions, and more\r\nTEMPEST 3D AUDIO: Hear the sounds of the world with pinpoint precision: the throttle of a stolen supercar, the rattle of neighboring gunfire, the roar of a helicopter overhead, and more', 'Games', 'IMG_11132022_104632.jpg'),
(145, 'WWE 2K22', 599000, 10, 'Get ripped out of the stands and hit with complete control of the WWE Universe. Hitting this hard has never been so easy.\r\nEverything from the controls to the graphics have been redesigned, and feels as real as being ringside at WrestleMania.', 'Games', 'IMG_11132022_104730.jpg'),
(146, 'Resident Evil 4 (Pre-Order)', 1299000, 30, 'Reawaken a Classic – Resident Evil 4 preserves the essence of the original game, now reconstructed using Capcom’s proprietary RE Engine to deliver realistic visuals and additional narrative depth to the iconic story that was not possible at the time of the original release.\r\nModernized Gameplay – The team from 2019’s Resident Evil 2 returns to build upon the series’ modern approach to survival horror. Engage in frenzied combat with the Ganados villagers, explore a European village gripped by madness, and solve puzzles to access new areas and collect useful items for Leon and Ashley’s constant struggle to survive.\r\nOverwhelming Hordes – Face hordes of rabid enemies that threaten to overwhelm Leon with even more diverse methods of attack than in the original release.', 'Games', 'IMG_11132022_104847.jpg'),
(147, 'One Piece Odyssey', 1029000, 15, 'ONE PIECE ODYSSEY is an RPG project filled with the unique elements of adventure from ONE PIECE that has been highly desired by fans\r\nEnjoy what you love about RPGs but with your favorite characters and an original touch from the ONE PIECE universe\r\nDefeat new enemies, unravel mysteries, and unearth a whole adventure with your favorite Straw Hats\r\nIn addition to Luffy, you can play as Zorc, Nami, Usopp, Sanji, Chopper, Robin, Frankie, and Brook', 'Games', 'IMG_11132022_104930.jpg'),
(148, 'Resident Evil: Village', 499000, 20, 'All new Resident Evil experience - picking up where Resident Evil 7 biohazard left Off, Resident Evil village is the eighth major installment in the flagship Resident Evil series\r\nNext generation Technology - Re engine paired with next-gen Console power will deliver photorealistic graphics, bringing the shadowy village and its haunting residents to life.\r\nFirst-person action - players will assume the role of Ethan winters and experience every up-close battle and terrifying pursuit through a first-person perspective.\r\nFamiliar faces and new foes - Chris Redfield has typically been a hero in the Resident Evil series, but his appearance in Resident Evil village seemingly shrouds him in sinister motives.\r\nA living, breathing village - more than just a mysterious backdrop for the Horrifying events that unfold in the game, The village is a character in its own right with mysteries for Ethan to uncover', 'Games', 'IMG_11132022_105019.jpg'),
(149, 'F1 Manager 2022', 899000, 15, 'Career – Become the Best - Write a new chapter in a bold new era for Formula 1. Choose your F1 team and guide them to glory throughout the official 2022 races by beginning your journey at the back of the grid or taking your place in pole position – in F1 Manager, the choice is yours.\r\nThe HQ – Build Your Team - Your constructor team are the beating heart of racing operations. Between races, control every detail of your team from HQ. Monitor the performance of your star drivers and staff, keep your finances in the black, and scout best-in-class staff from rival teams to give yourself an extra edge for upcoming races.\r\nThe Factory – Perfect Your Car - Get your hands on 2022’s striking new car design and race closer to your opponents than ever before. Assign new parts for your cars to prepare for the race ahead.\r\nThe Race – Create and Execute Your Strategy - From lights-out to the chequered flag, you’re in control. Own every decision from pit strategy to tyre choices to driver callouts. Plan your approach but be prepared to react to dynamic race events such as weather and fluctuating track conditions. Immerse yourself in a hyper-realistic simulation of an official F1 race presented in true-to-life broadcast quality.', 'Games', 'IMG_11132022_105147.jpg'),
(150, 'The Pathless', 499000, 20, 'The PS5 launch title combining open world exploration with epic boss encounters\r\nDash through a gorgeous wilderness with swift fluid motion and use your Eagle companion to explore the mysteries of the world\r\nAlso comes with six Premium art Cards\r\n', 'Games', 'IMG_11132022_105237.jpg'),
(151, 'Saints Row Day One Edition', 799000, 15, 'Discover the Weird, Wild, West - Dive in to Santo Ileso, the biggest and best Saints Row playground ever, spread across nine unique districts surrounded by the vast, majestic beauty of the Southwest Desert\r\nBuild Your Criminal Empire - Take over the city block by block, wage war against enemy factions and tighten your grip on the streets with ingenious criminal ventures\r\nFire Guns. LOTS of Guns - Shoot revolvers from the hip, fire and forget with a rocket launcher, or obliterate up close using melee heavyweights, complete with brutal takedowns\r\nTake to the Streets and the Skies - Blast through urban and desert environments in any one of the cars, bikes, planes, helicopters, VTOLs, hoverbikes, hoverboards, go-karts or equip your wingsuit to swoop around\r\nUnprecedented Customization - Create the Boss of your dreams, with the most extensive character customization suite ever seen in the series, then complete the look with incredible options for weapons and vehicles', 'Games', 'IMG_11132022_105339.jpg'),
(152, 'Gotham Knights', 899000, 15, 'Play as a New Guard of DC Super Heroes – Step into the roles of Batgirl, Nightwing, Red Hood and Robin and shape Gotham’s newest protector to create your own version of the Dark Knight.\r\nAction-Packed, Original Story Set in DC’s Batman Universe – With the Belfry as their base of operations, this new era of heroes will solve mysteries that connect the darkest chapters in Gotham’s history – from its soaring towers to its underground criminal network. Embark on rich storylines, including face-offs against some of the most infamous DC Super-Villains, such as Mr. Freeze, who is set on engulfing Gotham City in ice, and the mysterious Court of Owls, a secret society made up of Gotham City’s wealthiest families.\r\nExplore and Fight Crime in an Open-World Gotham City – Patrol the dark streets of five distinct boroughs in a dynamic, interactive Gotham using a variety of traversal abilities and heroic combat moves, as well as the iconic Batcycle. From street-level crimefighting to face-offs with iconic DC Super-Villains, save the city from descent into chaos.\r\nUnique Character Abilities and Customization – Each hero has unique abilities, gear, weapons and a customizable suit. Batgirl wields her melee tonfa Nightwing uses his signature dual escrima sticks; Red Hood has trained to reach peak human strength; and Robin is expertly skilled with his collapsible quarter staff.\r\nTeam Up in Two-Player, Online Co-Op – Play Gotham Knights solo or team up with a friend and combine strengths to protect Gotham City in two-player, online co-op.', 'Games', 'IMG_11132022_105432.jpg'),
(153, 'Marvel\'s Avengers', 299000, 10, 'Players can enjoy cross-gen play between PlayStation 4 and PlayStation 5\r\nMarvel\'s Avengers is a unique take on these iconic Super Heroes, including Captain America, Iron Man, the Hulk, Black Widow, and Thor; unlock powerful skills and new gear to build your ideal version of earth\'s mightiest heroes\r\nUp to 4 players can assemble online to defend the Earth from escalating threats', 'Games', 'IMG_11132022_105525.jpg'),
(154, 'Stray', 699000, 20, 'Stray is a third-person cat adventure game set amidst the detailed neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly\r\nRoam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by nothing but unassuming droids and dangerous creatures\r\nSee the world through the eyes of a cat and interact with the environment in playful ways\r\nBe stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this world\r\nComes with 6 full-color art cards', 'Games', 'IMG_11132022_105627.jpg'),
(155, 'Ratchet & Clank: Rift Apart', 1029000, 15, 'The intergalactic adventurers are back with Ratchet & Clank: Rift apart. Help them stop a robotic Emperor intent on conquering cross-dimensional worlds, with their own universe next in line.\r\nBuilt from the ground up by acclaimed studio insomniac games, go above and beyond with the mind-blowing speed and immersive features of the PS5 Console.\r\nBrand-new haptic feedback and adaptive trigger Technology creates astonishing physical sensations, bringing in-game actions to life in your hands via the dual sense wireless Controller.', 'Games', 'IMG_11132022_105718.jpg'),
(156, 'Assassin\'s Creed: Mirage', 799000, 15, 'Discover a tightly crafted, narrative-driven action-adventure experience that follows the transformation of a defiant young man into a refined Master Assassin.\r\nJourney to Alamut, the legendary home of the Assassins who laid the foundations of the Creed in this heartfelt homage to the game that started it all.\r\nExperience a modern take on the iconic features and gameplay that have defined a franchise for 15 years as you parkour seamlessly through the city and stealthily take down targets with more visceral assassinations than ever before.\r\nExplore an incredibly dense and vibrant city whose inhabitants react to your every move, and uncover the secrets of four unique districts as you venture through the Golden Age of Baghdad.\r\nPre-order now to get a bonus quest, The Forty Thieves.*Offer subject to change. Pre-order bonus content may be available for purchase and/or as giveaway(s) separately at Ubisoft’s sole discretion at any time', 'Games', 'IMG_11132022_105813.jpg'),
(157, 'Assassin\'s Creed: Valhalla', 499000, 10, 'Lead epic Viking raids against Saxon troops and fortresses\r\nRelive the visceral fighting style of the Vikings as you dual-wield powerful weapons\r\nChallenge yourself with the most varied collection of enemies ever in Assassin\'s Creed\r\nShape the growth of your character and your clan\'s settlement with every choice you make\r\nExplore a Dark Age open world, from the harsh shores of Norway to the beautiful kingdoms of England', 'Games', 'IMG_11132022_105942.jpg'),
(158, 'Call of Duty: Black Ops Cold War', 729000, 15, 'As Elite operatives, you will Follow the trail of a shadowy Figure named perseus who is on a mission to destabilize the global balance of power and change the course of history.\r\nDescend into the dark center of this global conspiracy alongside iconic characters woods, Mason and hudson and a new cast of operatives attempting to stop a plot decades in the making.\r\nBeyond the campaign, players will bring a cold war arsenal of weapons and equipment into the next generation of multiplayer and Zombies experiences.', 'Games', 'IMG_11132022_110038.jpg'),
(159, 'Sonic Frontiers', 999000, 15, 'Race across five massive overworlcl islands, each with their own unique action-platforming challenges and hidden secrets to uncover\r\nBlaze a trail as you see fit and discover side quests, solve puzzles, scale enormous structures, go fishing, and encounter a firendly face or two along the way\r\nUnlock Cyber Space levels featuring signature 3D platforming at Sonic speeds and a variety of challenges to test your skills like never before\r\nUse the all-new battle system and skill tree upgrades, combining moves such as dodges, parries, counters, combos, and the new Cyloop ability to take down mysterious foes\r\nBecome Sonic and journey to uncover the mysteries of the remains of an ancient civilization plagued by robotic hordes', 'Games', 'IMG_11132022_110243.jpg'),
(160, 'Dead Space', 1229000, 15, 'A sci-fi horror classic returns fully rebuilt from the ground up with elevated visual fidelity and 3D atmospheric audio.\r\nFollow an expanded narrative experience and uncover the dark secrets behind the events aboard the USG Ishimura.\r\nConfront the nightmare aboard the desolate spaceship with genre-defining strategic dismemberment gameplay.\r\nRepurpose and upgrade Isaac’s engineering tools to creatively defeat and dismember enemies.', 'Games', 'IMG_11132022_110332.jpg'),
(161, 'A Plague Tale: Requiem', 999000, 15, 'Sequel to the award-winning adventure, A Plague Tale: Innocence\r\nA spectacular grounded tale twisted by supernatural forces\r\nUse a variety of tools, sneak, fight, or unleash hell and rats\r\nStunning visuals combine with an enthralling score\r\nIncludes The Protector Pack DLC: Special crossbow skin, exclusive cosmetics for Amicia, and bonus crafting material', 'Games', 'IMG_11132022_110429.jpg'),
(162, 'PlayStation 4 Pro', 4999000, 10, 'CPU: 2.1GHz 8-core AMD Jaguar\r\nGPU: 4.2 TFLOP AMD Radeon (36CU, 911MHz)\r\nRAM: 8GB GDDR5 + 1GB\r\n327 x 295 x 55 mm (12.9 x 11.6 x 2.17 in) and 3.3 Kg (7.3lbs)\r\n3x USB 3.1, 1x Gigabit Ethernet, 1x PS Camera, Optical Audio output, HDMI 2.0', 'Console', 'IMG_11132022_111805.png'),
(163, 'PlayStation 4 Slim', 4299000, 10, 'CPU: 1.6GHz 8-core AMD Jaguar\r\nGPU: 1.84 TFLOP AMD Radeon (18CU, 800MHz)\r\nRAM: 8GB GDDR5\r\n288 x 265 x 39 mm (11.3 x 10.4 x 1.54 in) and 2.1 Kg (4.6lbs)\r\n2x USB 3.1, 1x Gigabit Ethernet, 1x PS Camera, HDMI 1.4', 'Console', 'IMG_11132022_111959.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `photo`) VALUES
(11, 'riskykurniawan', 'riskykurniawan', '$2y$10$y5fzouN9zfHXA9c5LwWdYeCg0DIFunijd59Sb.qC4AxDvZhoZfeua', 'riskykrnawan@gmail.com', '', ''),
(13, 'admin', 'admin', '$2y$10$TfC5doldIIAmpM2LaJdGpeXkBaXi0pc3FO3K9/cnrrAZks1B.E9XC', 'admin', 'Jl Kipas Angin, Depok, Indonesia, 13120', 'IMG_11122022_014547.png'),
(14, '12345', '123', '$2y$10$wppnSVsWFPLVcelZbjONq.Ge6g.7Si888N1V0HY5DmHpuJx7B4Qr2', '123@2.2', 'Utan Kayu Selatan, Matraman, Jakarta Timur, Indonesia, 13120 222', 'IMG_11132022_092430.png'),
(19, 'risky', 'risky', '$2y$10$MjlA68YbFaemSEF/BQrw8O1gq8qfzVarVlRVnBlKBubyM9t6lPlZe', 'risky@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
