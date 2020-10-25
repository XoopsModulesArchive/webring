<?php

class WebRingSite
{
    public $id;

    public $uid;

    public $wrid;

    public $nom;

    public $url;

    public $description;

    public $entrees;

    public $sorties;

    public $webring;

    public $db;

    public function WebRingSite($id)
    {
        global $db;

        $this->db = $db;

        if (is_array($id)) {
            $this->makeWebRingSite($id);
        } elseif (-1 != $id) {
            $this->getWebRingSite($id);
        }
    }

    public function getWebRingSite($id)
    {
        $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' WHERE id=' . $id . '';

        $array = $this->db->fetch_array($this->db->query($sql));

        $this->makeWebRingSite($array);
    }

    public function makeWebRingSite($array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }

        $this->webring = new WebRing($array['wrid']);
    }

    public function webring()
    {
        return $this->webring;
    }

    public function suivant()
    {
        $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' WHERE id>' . $this->id . ' and wrid=' . $this->wrid . ' ORDER BY id';

        $array = $this->db->fetch_array($this->db->query($sql, 1, 0));

        // si vide => on revient au début du ring

        // echo "id=".$this->id."<br>";

        // echo "count ".count($array)."<br>";

        if (0 == count($array) || '' == $array['id']) {
            // echo "on va au deb<br>";

            $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' ORDER BY id';

            $array = $this->db->fetch_array($this->db->query($sql, 1, 0));
        }

        $newwrs = new self($array);

        $this->ajoutsortie();

        $newwrs->ajoutentree();

        return $newwrs;
    }

    public function precedent()
    {
        $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' WHERE id<' . $this->id . ' and wrid=' . $this->wrid . ' ORDER BY id';

        $array = $this->db->fetch_array($this->db->query($sql, 1, 0));

        // si vide => on revient au début du ring

        if (0 == count($array) || '' == $array['id']) {
            $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' ORDER BY id DESC';

            $array = $this->db->fetch_array($this->db->query($sql, 1, 0));
        }

        // out+1 sur source & in+1 sur site cible

        $newwrs = new self($array);

        $this->ajoutsortie();

        $newwrs->ajoutentree();

        return $newwrs;
    }

    public function hasard()
    {
        $max = $this->webring->nbsites();

        if (1 == $max) {
            return $this;
        } // 1 seul site=>on reste sinon boucle sans fin!

        mt_srand((float)microtime() * 1234567);

        $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' WHERE wrid=' . $this->wrid . ' ORDER BY id';

        do {
            $num = mt_rand(1, $max) - 1;

            $array = $this->db->fetch_array($this->db->query($sql, 1, $num));
        } while ($array['id'] == $this->id);

        $newwrs = new self($array);

        $this->ajoutsortie();

        $newwrs->ajoutentree();

        return $newwrs;
    }

    public function ajoutentree()
    {
        $sql = 'UPDATE ' . $this->db->prefix('webringsite') . ' SET entrees=entrees+1 WHERE id=' . $this->id;

        $this->db->setDebug(true);

        $this->db->queryF($sql);
    }

    public function ajoutsortie()
    {
        $sql = 'UPDATE ' . $this->db->prefix('webringsite') . ' SET sorties=sorties+1 WHERE id=' . $this->id;

        $this->db->queryF($sql);
    }

    /*
    function toutLeWebRing($wrid)
    {
    ;
    }
    */
}

class WebRing
{
    public $wrid;

    public $nom;

    public $image;

    public $description;

    public $db;

    public function WebRing($id = -1)
    {
        global $db;

        $this->db = $db;

        if (is_array($id)) {
            $this->makeWebRing($id);
        } elseif (-1 != $id) {
            $this->getWebRing($id);
        }
    }

    public function getWebRing($wrid)
    {
        $sql = 'SELECT * FROM ' . $this->db->prefix('webring') . ' WHERE wrid=' . $wrid . '';

        $array = $this->db->fetch_array($this->db->query($sql));

        $this->makeWebRing($array);
    }

    public function makeWebRing($array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }

    public function sites()
    {
        $sql = 'SELECT * FROM ' . $this->db->prefix('webringsite') . ' WHERE wrid=' . $this->wrid . '';

        $res = $this->db->query($sql);

        $webringsite = [];

        while (false !== ($row = $this->db->fetch_array($res))) {
            $webringsite[] = new WebRingSite($row);
        }

        return $webringsite;
    }

    public function nbsites()
    {
        $sql = 'SELECT COUNT(*) FROM ' . $this->db->prefix('webringsite') . ' WHERE wrid=' . $this->wrid . '';

        $res = $this->db->query($sql);

        $row = $this->db->fetch_row($res);

        return $row[0];
    }

    public function nouveau($nom, $description, $image = '')
    {
        $newwrid = $this->db->genId('webring_wrid_seq');

        $this->db->SetDebug(true);

        $sql = 'INSERT INTO ' . $this->db->prefix('webring') . '(wrid,nom,description,image) ';

        $sql .= "VALUES ('$newwrid','$nom','$description','$image')";

        $result = $this->db->query($sql);

        if (0 == $newwrid) {
            $newwrid = $this->db->insert_id();
        }

        $this->getWebRing($newwrid);
    }

    public function listeWebRing($limit = 0, $asobject = true)
    {
        global $db, $xoopsMyts;

        $db = $db;

        $ret = [];

        $sql = 'SELECT * FROM ' . $db->prefix('webring');

        $result = $db->query($sql, $limit, 0);

        while (false !== ($myrow = $db->fetch_array($result))) {
            if ($asobject) {
                $ret[] = new self($myrow);
            } else {
                $ret[$myrow['wrid']] = $xoopsMyts->htmlSpecialChars($myrow['nom']);
            }
        }

        return $ret;
    }
}
