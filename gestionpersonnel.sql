CREATE TABLE `personnel` (
  `ID_perso` int(15) NOT NULL,
  `nom_perso` varchar(30) NOT NULL,
  `prenom_perso` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motdepasse` varchar(30) NOT NULL,
  `numero` INT(13) NOT NULL,
  `role` varchar(30) NOT NULL,
  `date_dajout` date NOT NULL,
  `ID_equipe` int(15)
)

ALTER TABLE `personnel`
  ADD PRIMARY KEY (`ID_perso`);

ALTER TABLE `personnel`
  MODIFY `ID_personnel` int(15) NOT NULL AUTO_INCREMENT;

CREATE TABLE `projets` (
  `ID_projet` int(15) PRIMARY KEY AUTO_INCREMENT,
  `nom_projet` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_creation` date NOT NULL,
  `date_fin` date,
  `status` varchar(30) NOT NULL,
  `ID_scrum` int(11) 
) 

CREATE TABLE `equipe` (
  `ID_equipe` int(15) PRIMARY KEY AUTO_INCREMENT,
  `nom_equipe` varchar(50) NOT NULL,
  `date_creation` date NOT NULL,
  `date_fin` date,
  `ID_scrum` int(11) 
)



INSERT INTO `personnel` (`ID_perso`, `nom_perso`, `prenom_perso`, `email`, `motdepasse`, `numero`, `role`, `date_dajout`) VALUES ('1', 'Beghdi', 'Hiba', 'beghiba@gmail.com', 'hiba123', '0658144394', 'Product Owner', '2023-11-24');
INSERT INTO `personnel` (`ID_perso`, `nom_perso`, `prenom_perso`, `email`, `motdepasse`, `numero`, `role`, `date_dajout`) VALUES ('2', 'Beghdi', 'Aya', 'begaya@gmail.com', 'aya123', '0612345987', 'Scrum Master', '2023-11-24');
INSERT INTO `personnel` (`ID_perso`, `nom_perso`, `prenom_perso`, `email`, `motdepasse`, `numero`, `role`, `date_dajout`) VALUES ('3', 'Beghdi', 'Doha', 'begdoha@gmail.com', 'doha123', '0698745321', 'Membre', '2023-11-24');




ALTER TABLE `projets`
  ADD CONSTRAINT `FK_projets` FOREIGN KEY (`ID_productOwner`) REFERENCES `personnel` (`ID_perso`);

ALTER TABLE `projets`
  ADD CONSTRAINT `FK_equipe` FOREIGN KEY (`ID_equipe`) REFERENCES `equipe` (`ID_equipe`);
  

ALTER TABLE `equipe`
  ADD CONSTRAINT `FK_scrum` FOREIGN KEY (`ID_scrum`) REFERENCES `personnel` (`ID_perso`);


ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_eq` FOREIGN KEY (`ID_eq`) REFERENCES `equipe` (`ID_equipe`);







CREATE TABLE `equipe` (
  `ID_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(30) NOT NULL,
  `date_creation_eq` date NOT NULL
)


ALTER TABLE `equipe`
  ADD PRIMARY KEY (`ID_equipe`);


ALTER TABLE `membre`
  MODIFY `ID_membre` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


INSERT INTO `equipe` (`ID_equipe`, `nom_equipe`, `date_creation_eq`) VALUES
(1, 'javascript', '2023-01-01'),
(2, 'Java', '2023-02-02'),


CREATE TABLE `membre` (
  `ID_membre` int(15) NOT NULL,
  `NOM_membre` varchar(30) NOT NULL,
  `prenom_membre` varchar(30) NOT NULL,
  `email_membre` varchar(30) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ID_eq` int(11) NOT NULL
) 


ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID_membre`),
  ADD KEY `FK_membre` (`ID_eq`);


ALTER TABLE `equipe`
  MODIFY `ID_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `membre`
  ADD CONSTRAINT `FK_membre` FOREIGN KEY (`ID_eq`) REFERENCES `equipe` (`ID_equipe`);
COMMIT;


INSERT INTO `membre` (`ID_membre`, `NOM_membre`, `prenom_membre`, `email_membre`, `phone_number`, `role`, `status`, `ID_eq`) VALUES
(1, 'BEGHDI', 'HIBA', 'beghiba@gmail.com', 658144394, 'Leader', 'celibataire', 1),
(2, 'Ouafidi', 'Oussama', 'ouafidi@gmail.com', 614012000, 'Leader', 'celibataire', 1),
(4, 'BEGHDI', 'ayouya', 'beghiba@gmail.com', 658144394, 'Employee', 'celibataire', 2),
(5, 'soufiane', 'soufiane', 'soufiane@gmail.com', 612345789, 'Employee', 'marié', 1);



