SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Adatbázis: `szalon`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL,
  `make` varchar(15) NOT NULL,
  `model` varchar(20) NOT NULL,
  `year` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `year`) VALUES
(1, 'Lada', '1500', 1994),
(2, 'Nissan', '370 Z', 2013);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `message` text NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `review`
--

INSERT INTO `review` (`review_id`, `email`, `grade`, `message`, `car_id`) VALUES
(1, 'moka@kacagas.com', 4, 'DB_test', 2),
(2, 'hihi@haha.com', 5, 'HAHAHA', 2),
(3, 'a@a.com', 5, 'a', 2);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
