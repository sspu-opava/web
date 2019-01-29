-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 20. úno 2017, 23:55
-- Verze serveru: 10.1.9-MariaDB
-- Verze PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `zaklady`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `filmy`
--

CREATE TABLE `filmy` (
  `idfilmy` int(10) UNSIGNED NOT NULL,
  `nazev` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rok` year(4) DEFAULT NULL,
  `delka` int(3) DEFAULT NULL,
  `obsah` text COLLATE utf8_unicode_ci,
  `plakat` longblob,
  `hodnoceni` smallint(1) DEFAULT '0',
  `format` enum('černobílý','barevný','3D') COLLATE utf8_unicode_ci DEFAULT 'barevný',
  `idzanr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `filmy`
--

INSERT INTO `filmy` (`idfilmy`, `nazev`, `rok`, `delka`, `obsah`, `plakat`, `hodnoceni`, `format`, `idzanr`) VALUES
(1, 'Vetřelec', 1979, 112, 'V první části kultovní sci-fi ságy se setkáváme se Sigourney Weaver v roli statečné Ripleyové, která jako jediná z posádky vesmírné lodi Nostromo zůstává naživu v souboji s hrůznou bytostí, jejíž zárodek se dostal na palubu z líhně na neznámé planetě.', NULL, 4, 'barevný', 9),
(2, 'Gladiátor', 2000, 149, 'Římský generál Maximus (Russell Crowe) opět dovedl své legie k vítězství na bitevním poli. Válka je vyhrána a Maximus sní o domově. Nepřeje si nic jiného, než se vrátit k ženě a svému synovi. Umírající vládce Marcus Aurelius (Richard Harris) pro něj nicméně má ještě jeden úkol. Žádá, aby se generál ujal vlády. Commodus (Joaquin Phoenix), dědic trůnu, žárlí na vládcovu přízeň Maximovi a nařizuje Maximovu popravu, včetně jeho rodiny. Maximus sice o vlásek unikne smrti, ale těžce zraněného ho "zachrání" otrokáři. Maximus se tak dostane do gladiátorské školy a v aréně jeho sláva den ode dne roste. Nyní přichází do Říma, aby pomstil vraždu ženy a svého syna, aby zabil nového císaře - Commoda. Poznal, že jediná moc, silnější než vládcova, je vůle lidu. Cesta, která vede k naplnění Maximovy pomsty je stát se největším hrdinou celé říše.', NULL, 4, 'barevný', 5),
(3, 'Americký gangster', 2007, 157, 'Čtyři ikony filmového průmyslu se sešly u kolébky akčního dramatu Americký gangster, který aspiruje na jeden z nejsilnějších zážitků, jež si v roce 2008 odnesete z kina. Oscary ověnčení herci Russell Crowe (Gladiátor, Insider: Muž, který věděl příliš mnoho) a Denzel Washington (Training Day, Hurikán v ringu) se spojili s oscarovým scenáristou Stevem Zaillianem (Schindlerův seznam, Gangy New Yorku) a neméně úspěšným režisérem Ridleym Scottem (Gladiátor, Černý jestřáb sestřelen).', NULL, 2, 'barevný', 1),
(4, 'Schindlerův seznam', 1993, 195, 'Film podle skutečných událostí, které do své knihy sepsal Thomas Keneally natočil slavný režisér židovského původu Steven Spielberg, který za film dostal svého prvního režijního Oscara své kariéry. Splnil tím "povinnost" vůči ostatním židům a sám za tržby filmu nevzal do vlastní kapsy ani dolar.', NULL, 3, 'černobílý', 5),
(5, 'Indiana Jones a Chrám zkázy', 1984, 114, 'Volné pokračování Dobyvatelů ztracené archy, které se však odehrává o rok dřív, roku 1935. Indiana se tentokrát v šanghajském klubu zaplete s čínským gangsterským bossem. Ve hře je zprvu "jen" stará čínská socha a vzácný diamant, záhy však i samotný Jonesův život.', NULL, 3, 'barevný', 3),
(6, 'Postřižiny', 1980, 93, 'Mozaika humorně laděných událostí začíná jedním z malých rituálů, kterými si koření spokojené manželství Francin a Maryška.', NULL, 3, 'barevný', 4),
(7, 'Slavnosti sněženek', 1983, 83, 'Nezapomenutelný spor dvou mysliveckých spolků nad zastřeleným kancem. Povídka je vlastně portrétní miniaturou sousedů, s nimiž Bohumil Hrabal žil uprostřed chatové oblasti v Kersku nedaleko Prahy. Většina literárních postav má svůj reálný a živý předobraz. S neopakovatelným vypravěčským stylem spisovatele a skvělou profesionální technikou režiséra se před vašima očima rozvíjí nostalgická, ale především hluboce lidská freska žánrových příběhů lidí a lidiček žijících v Polabí. ', NULL, 4, 'barevný', 4),
(8, 'Romance pro křídlovku', 1966, 86, 'Byly to pouhé čtyři takty z Herkulových lázní na křídlovku, které přiměly hosta odcházejícího pozdě večer z venkovské hospody, aby si pozorněji prohlédl hráče. Tak se po třiceti letech setkají dva muži, jež před lety spojovala láska k dívce od kolotočů.', NULL, 3, 'černobílý', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `password` char(128) COLLATE utf8_czech_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `surname` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `role` enum('administrator','redaktor') COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `firstname`, `surname`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tomáš', 'Administrátor', 'admin@email.cz', 'administrator'),
(4, 'spejbl', '39b8a776cde6e4694bfbee880186d95d', 'Josef', 'Spejbl', 'spejbl@email.cz', 'redaktor'),
(5, 'hurvinek', '67e4a43f72cc4ff3b302c4333b4d48b8', 'Alois', 'Hurvínek', 'hurvinek@email.cz', 'redaktor');

-- --------------------------------------------------------

--
-- Struktura tabulky `zanry`
--

CREATE TABLE `zanry` (
  `idzanr` int(11) NOT NULL,
  `nazev_zanru` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `zanry`
--

INSERT INTO `zanry` (`idzanr`, `nazev_zanru`) VALUES
(3, 'fantasy'),
(5, 'historický'),
(8, 'jiný'),
(4, 'komedie'),
(7, 'pohádka'),
(6, 'psychologický'),
(2, 'romantický'),
(9, 'sci-fi'),
(1, 'thriller');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`idfilmy`),
  ADD KEY `nazev` (`nazev`),
  ADD KEY `rok` (`rok`),
  ADD KEY `fk_idzanr` (`idzanr`),
  ADD KEY `hodnoceni` (`hodnoceni`),
  ADD KEY `format` (`format`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `name` (`surname`,`firstname`);

--
-- Klíče pro tabulku `zanry`
--
ALTER TABLE `zanry`
  ADD PRIMARY KEY (`idzanr`),
  ADD KEY `zanr` (`nazev_zanru`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `filmy`
--
ALTER TABLE `filmy`
  MODIFY `idfilmy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `zanry`
--
ALTER TABLE `zanry`
  MODIFY `idzanr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `filmy`
--
ALTER TABLE `filmy`
  ADD CONSTRAINT `fk_idzanr` FOREIGN KEY (`idzanr`) REFERENCES `zanry` (`idzanr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
