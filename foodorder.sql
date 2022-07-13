-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lip 2022, 18:28
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `foodorder`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `id_usera` int(10) NOT NULL,
  `Imie` text NOT NULL,
  `Nazwisko` text NOT NULL,
  `Miejscowosc` text NOT NULL,
  `Ulica` text NOT NULL,
  `Nr_domu` text NOT NULL,
  `Nr_tel` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`id_usera`, `Imie`, `Nazwisko`, `Miejscowosc`, `Ulica`, `Nr_domu`, `Nr_tel`) VALUES
(16, 'Bartosz ', 'Rokicki', 'Opoczno', 'Morwowa', '5', '123456789');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `tytul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `kategoria_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food`
--

INSERT INTO `food` (`id`, `tytul`, `opis`, `cena`, `kategoria_id`) VALUES
(1, 'Burger Cheesy', 'sałata, mięso x2, ser cheddar x3, ogórek kiszony, grillowana cebula, sos miodowo-musztardowy', '30.00', 3),
(2, 'Burger Classic', 'sałata, mięso x2, cebula, ogórek kiszony, sos klasyczny', '28.00', 3),
(3, 'Kurczak chrupiący', 'Kurczak w panierce z mąki kukurydzianej z dodatkiem sosu własnego. Podawany z ryżem i surówką. ', '28.50', 2),
(4, 'Kurczak na maśle', 'Podawany z cytryną, ryżem i surówką z białej kapusty i marchewki', '35.50', 2),
(5, 'Rosół z kurczakiem i makaronem', '', '18.00', 1),
(6, 'Zestaw Kotlet schabowy\r\n', 'Kotlet schabowy podawany z ziemniakami i mizerią. ', '24.00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `tytul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `image_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `tytul`, `image_name`, `opis`) VALUES
(1, 'Kuchnia Polska', 'img/kuchnia_polska.jpg', 'Kuchnia polska powstała z połączenia lokalnych tradycji oraz wpływów kulinarnych innych narodów zamieszkujących tereny dawnej Rzeczypospolitej. Wśród nich największy ślad pozostawiły kuchnie niemiecka, żydowska, francuska oraz wschodnie – rusińska i tatarsko-turecka. Polska kuchnia jest stosunkowo ciężka. Charakterystyczna jest dla niej duża ilość dań mącznych oraz rzadko spotykana w innych tradycjach kulinarnych ilość różnego rodzaju zup. Często korzysta się w niej także z owoców runa leśnego oraz mięsa i nabiału. Nie brakuje warzyw, ryb słodkowodnych i aromatycznych przypraw.'),
(2, 'Kuchnia Azjatycka', 'img/kuchnia_azjatycka.jpg', 'Kuchni azjatyckiej przypisywanych jest wiele specyficznych składników, które sprawiają, że potrawy wywodzące się z tego zakątka świata odznaczają się niezwykłym smakiem i aromatem. Sztuka kulinarna Azji jest wyjątkowo zróżnicowana, gdyż obejmuje nie tylko kuchnię chińską czy japońską, ale również kuchnię wietnamską, koreańską i tajlandzką. Łączy ją jednak powszechne zastosowanie ryżu, sosu sojowego, owoców morza oraz różnych orientalnych przypraw.'),
(3, 'Kuchnia Amerykańska', 'img/kuchnia_amerykanska.jpg', 'Tradycyjna kuchnia w stylu amerykańskim jest kaloryczna i przyrządzana szybko. Na jej ukształtowanie wpłynęły m.in. sposób odżywiania dawnych plemion indiańskich oraz przenikanie się kuchni meksykańskiej, chińskiej, europejskiej a zwłaszcza włoskiej oraz kuchni żydowskiej. Jest też wynikiem dużego tempa, w jakim żyją Amerykanie i odległości do pokonania (Ameryka to tysiące mil dróg między miastami, parkami i różnymi atrakcjami). Stąd pojawiła się potrzeba szybkich dań, które można zabrać ze sobą do samochodu lub zjeść w ruchu.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_zamowienia` int(11) NOT NULL,
  `id_usera` int(11) NOT NULL,
  `id_potrawy` int(11) NOT NULL,
  `nazwa_potrawy` text NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_zamowienia`, `id_usera`, `id_potrawy`, `nazwa_potrawy`, `cena`, `ilosc`) VALUES
(48, 13, 2, 'Burger Classic', '28.00', 1),
(89, 0, 2, 'Burger Classic', '28.00', 1),
(90, 0, 4, 'Kurczak na maśle', '35.50', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_usera` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `E_mail` text NOT NULL,
  `uprawnienie` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_usera`, `Username`, `Password`, `E_mail`, `uprawnienie`) VALUES
(15, 'Admin', '$2y$10$X5Byss5TRPFwmTQNWfL7x.l1xR3BYcp0yUQZiWJw8Ia7UxFhOqXt.', 'roko2002@gmail.com', 1),
(16, 'Roki100', '$2y$10$jJGmx9/WAqJmhz6aF3CA5e2kirfWo65Fm67jNGcH5QQ55hYkE7XE6', 'kilok6512@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `Imie` text NOT NULL,
  `Nazwisko` text NOT NULL,
  `Adres` text NOT NULL,
  `data_zamowienia` datetime NOT NULL,
  `Id_usera` int(11) NOT NULL,
  `nazwa_potrawy` text NOT NULL,
  `id_potrawy` int(11) NOT NULL,
  `cena` decimal(9,2) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `Imie`, `Nazwisko`, `Adres`, `data_zamowienia`, `Id_usera`, `nazwa_potrawy`, `id_potrawy`, `cena`, `ilosc`) VALUES
(42, 'Bartosz ', 'Rokicki', 'Opoczno, Morwowa, 5', '2022-07-01 17:34:54', 16, 'Kurczak na maśle', 4, '35.50', 1),
(43, 'Bartosz ', 'Rokicki', 'Opoczno, Morwowa, 5', '2022-07-01 17:35:26', 16, 'Kurczak na maśle', 4, '35.50', 1),
(44, 'ffff', 'ffff', 'ffff', '2022-05-04 17:42:02', 999, 'fff', 5, '34.00', 2),
(45, '', '', ', , ', '2022-07-06 21:31:34', 12, 'Burger Cheesy', 1, '30.00', 1),
(46, '', '', ', , ', '2022-07-06 21:31:34', 12, 'dd', 16, '1.00', 1),
(47, '', '', ', , ', '2022-07-06 22:55:52', 0, 'Burger Cheesy', 1, '60.00', 2),
(48, '', '', ', , ', '2022-07-06 23:06:54', 0, 'Burger Cheesy', 1, '30.00', 1),
(49, '', '', ', , ', '2022-07-06 23:11:53', 12, 'Burger Classic', 2, '28.00', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usera`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_usera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
