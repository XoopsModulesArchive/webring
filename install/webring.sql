#
# Structure de la table `webring`
#
CREATE TABLE webring (
    wrid        INT(5)      NOT NULL AUTO_INCREMENT,
    nom         VARCHAR(50) NOT NULL DEFAULT '',
    image       VARCHAR(100)         DEFAULT NULL,
    description VARCHAR(100)         DEFAULT NULL,
    PRIMARY KEY (wrid)
)
    ENGINE = ISAM;
# --------------------------------------------------------
#
# Structure de la table `webringsite`
#
CREATE TABLE webringsite (
    id          INT(5)       NOT NULL AUTO_INCREMENT,
    uid         INT(5)       NOT NULL DEFAULT '0',
    wrid        INT(5)       NOT NULL DEFAULT '0',
    nom         VARCHAR(50)  NOT NULL DEFAULT '',
    url         VARCHAR(100) NOT NULL DEFAULT '',
    description VARCHAR(100)          DEFAULT NULL,
    entrees     INT(7)       NOT NULL DEFAULT '0',
    sorties     INT(7)       NOT NULL DEFAULT '0',
    PRIMARY KEY (id),
    KEY idxwrid (wrid)
)
    ENGINE = ISAM;
