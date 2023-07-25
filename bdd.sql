CREATE DATABASE devparty;

USE devparty;

CREATE TABLE `devparty`.`users`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `role` INT NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE evenements
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    categorie INT NOT NULL,
    nbrParticipant INT NOT NULL,
    createur INT NOT NULL,
    prix FLOAT NOT NUll,
    date DATE
);

CREATE TABLE categories
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100)
);

CREATE TABLE roles
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL
);

ALTER TABLE evenements
    ADD CONSTRAINT FK_EvenementUser
    FOREIGN KEY (createur) REFERENCES users (id);

ALTER TABLE evenements
    ADD CONSTRAINT FK_EvenementCategorie
    FOREIGN KEY (categorie) REFERENCES categories (id);

ALTER TABLE `users`
    ADD CONSTRAINT `FK_UserRole` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);


CREATE TABLE inscriptions
(
    id_evenement int not null,
    id_user int not null,
    PRIMARY KEY (id_evenement, id_user),
    FOREIGN KEY (id_evenement) REFERENCES evenements (id) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE
);


INSERT INTO categories VALUES (null, 'Evenement');

INSERT INTO roles VALUES (null, 'Etudiant');
INSERT INTO roles VALUES (null, 'Membre');
INSERT INTO roles VALUES (null, 'Administrateur');

INSERT INTO users
VALUES (null, 'admin@email.com', '123', 'ADMIN', 'admin', '3');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Soirée Gala',
        'Une soirée de gala est un moment important dans la vie d’une entreprise. Organisée annuellement ou pour clôturer un congrès ou un séminaire, elle doit transmettre les valeurs et l’image de l’entreprise et refléter un certain standing.',
        'imageevent3.png', '1', '0', '1', '35.99', '2022-07-24');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Projet annuel ESGI',
        'Dans un premier temps, vous présentez votre travail dans les grandes lignes en mettant l’accent sur les principales étapes de sa démonstration. Vous ne devez pas entrer dans les détails au risque de lasser le jury.',
        'conference.jpg', '1', '0', '1', '0', '2022-06-24');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Lorem Ipsum',
        'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès quil est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.',
        'imageevent2.png', '1', '0', '1', '23', '2022-08-24');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Lorem Ipsum',
        'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès quil est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.',
        'imageevent1.png', '1', '0', '1', '23', '2022-08-12');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Lorem Ipsum',
        'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès quil est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.',
        'paysage.jpg', '1', '0', '1', '23', '2022-09-12');

INSERT INTO `evenements`(`id`, `titre`, `description`, `image`, `categorie`, `nbrParticipant`, `createur`, `prix`, `date`)
VALUES (null, 'Lorem Ipsum',
        'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès quil est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.',
        'rome.jpg', '1', '0', '1', '23', '2022-07-05');
