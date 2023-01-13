DROP DATABASE if EXISTS `tour`;

CREATE DATABASE `tour`;

USE `tour`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(30) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`) VALUES
(1, 'stanislgi1', '$2y$10$foJL0YFlm0kJKjQVbVDl3O0ZT1nzfagpeYG4Qg0efhmaKeluVmEJW', 'Stanislava Ivanova', 'stanislgi1@uni-sofia.bg'), 
(2, 'arhalachev', '$2y$10$fek8734Ztplf9O6GWqmz..Q4vqxQIW/1iu63kxLmiq.E80NgU9Uj.', 'Asibe Halacheva', 'arhalachev@uni-sofia.bg'),
(3, 'stnssllv', '$2y$10$4BGQmbj7Zts2w2yJFzrpgeHv/H0JZBFGetG87YTBS0HB3Gj.uY2ji', 'St Iv', 'stanissllava.iv@gmail.com');


CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `name_dest` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `departure` date NOT NULL,
  `img` varchar(1024)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `destinations` (`id`, `dest_id`, `name_dest`, `price`, `departure`, `img`) VALUES
(1, 1, 'Дубай', 5000, '2023-01-26', 'https://media.istockphoto.com/id/467829216/photo/dubai-marina.jpg?b=1&s=170667a&w=0&k=20&c=7fZv26b4z8x7lE_7YKUerhjrtLLN1u_AQMaFNykFWPU='),
(2, 2, 'Малта', 8000, '2023-02-08', 'https://media.istockphoto.com/id/1166661889/photo/aerial-view-of-lady-of-mount-carmel-church-st-pauls-cathedral-in-valletta-city-malta.jpg?s=612x612&w=0&k=20&c=nuc07J1IeIQMTrTRkfS7yltdjD4NAFyC_ZeppxBmJNA='),
(3, 3, 'Барселона', 10000, '2023-01-31', 'https://media.istockphoto.com/id/1136326969/photo/view-of-the-city-from-park-guell-in-barcelona-spain.jpg?b=1&s=170667a&w=0&k=20&c=UBstffCwJzjZlOHzB2aK2J7363bgVxyCcDd4IqNYo-E='),
(4, 4, 'Париж', 4000, '2023-05-25', 'https://media.istockphoto.com/id/1280246120/photo/eiffel-tower-in-paris-skyline-at-dawn.jpg?b=1&s=170667a&w=0&k=20&c=aKos9h3WQiUJoUIfH4bXhA9frvUzPYMnk5KyBMdjeNQ='),
(5, 5, 'Сингапур', 9000, '2023-02-18', 'https://media.istockphoto.com/id/491056644/photo/singapore-skyline-cityscape-at-night.jpg?s=612x612&w=0&k=20&c=kdXYIXNV-8WM3ZOeBCS2JLgrqbTbV6YUWDFIHFThwwk='),
(6, 6, 'Венеция', 4500, '2023-03-09', 'https://media.istockphoto.com/id/1388018793/photo/grand-canal-in-venice.jpg?b=1&s=170667a&w=0&k=20&c=OFgzwNIGVwewTC21JtOecQiFMCg1wlp7cuQkR_UxEHU='),
(7, 1, 'Дубай', 5500, '2023-02-06', 'https://media.istockphoto.com/id/1333035210/photo/sunset-view-of-the-dubai-marina-and-jbr-area-and-the-famous-ferris-wheel-and-golden-sand.jpg?b=1&s=170667a&w=0&k=20&c=cYgbQF26FiE9SvkaFv6dmmZLh1WM7ZG7iuGpzEsZktE=');


ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


CREATE TABLE `dests` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `dests` (`id`, `name`) VALUES
(1, 'Дубай'),
(2, 'Малта'),
(3, 'Барселона'),
(4, 'Париж'),
(5, 'Сингапур'),
(6, 'Венеция');