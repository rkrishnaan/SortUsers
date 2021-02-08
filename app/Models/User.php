<?php

namespace App\Models;

use DateTime;

class User implements \JsonSerializable
{

    public String $firstName;
    public String $lastName;
    public DateTime $firstLoginDate;
    public DateTime $lastLoginDate;


    public function __construct(
        String $firstName,
        String $lastName,
        DateTime $firstLoginDate,
        DateTime $lastLoginDate) {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->firstLoginDate = $firstLoginDate;
        $this->lastLoginDate = $lastLoginDate;
    }

    public function getFirstName(): String {
        return $this->firstName;
    }

    public function getLastName(): String {
        return $this->lastName;
    }

    public function getFirstLoginDate(): DateTime {
        return $this->firstLoginDate;
    }

    public function getLastLoginDate(): DateTime {
        return $this->lastLoginDate;
    }

    /**
     * This method retrieves the all the Users
     *
     * @return array of users (First Name, Last Name, First Login Date, Last Login Date)
     */
    public static function getAllUsers() : array
    {
        $allUsers = array (
            array("Rachael","Dixom","2016-06-24 23:11:06", "2021-01-01 13:27:06"),
            array("Kyla","Aguirre","2016-06-23 23:11:06", "2021-01-02 13:27:06"),
            array("Ayat","Kay","2016-06-22 23:11:06", "2021-01-03 13:27:06"),
            array("Jim","Hill","2016-06-21 23:11:06", "2021-01-04 13:27:06"),
            array("Lula","Wilkins","2016-06-20 23:11:06", "2021-01-05 13:27:06"),
            array("Kymani","Burn","2016-06-29 23:11:06", "2021-01-06 13:27:06"),
            array("Anisah","Cano","2016-06-28 23:11:06", "2021-01-07 13:27:06"),
            array("Winifred","Sheldon","2016-06-27 23:11:06", "2021-01-08 13:27:06"),
            array("Humayrq","O'Doherty","2016-06-26 23:11:06", "2021-01-09 13:27:06"),
            array("Jordanna","Gonzales","2016-06-25 23:11:06", "2021-01-01 13:27:06"),
            array("Abubakar","Butler","2016-06-24 23:11:06", "2021-01-02 13:27:06"),
            array("Carwyn","Holcomb","2016-06-23 23:11:06", "2021-01-03 13:27:06"),
            array("Dylan","Forbes","2016-06-22 23:11:06", "2021-01-04 13:27:06"),
            array("Jake","Woodcock","2016-06-21 23:11:06", "2021-01-05 13:27:06"),
            array("Sion","Hahn","2016-06-20 23:11:06", "2021-01-06 13:27:06"),
            array("Diane","English","2016-06-29 23:11:06", "2021-01-07 13:27:06"),
            array("Demi","Melendez","2016-06-28 23:11:06", "2021-01-08 13:27:06"),
            array("Guto","Pratt","2016-06-27 23:11:06", "2021-01-09 13:27:06"),
            array("Zara","Grey","2016-06-26 23:11:06", "2021-01-01 13:27:06"),
            array("Soraya","Beaumont","2016-06-25 23:11:06", "2021-01-02 13:27:06"),
            array("Domas","Rivera","2016-06-24 23:11:06", "2021-01-03 13:27:06"),
            array("Myrtle","Sims","2016-06-23 23:11:06", "2021-01-04 13:27:06"),
            array("Rizwan","Hayden","2016-06-22 23:11:06", "2021-01-05 13:27:06"),
            array("Abiha","Mair","2016-06-21 23:11:06", "2021-01-06 13:27:06"),
            array("Rafi","Abbott","2016-06-20 23:11:06", "2021-01-07 13:27:06")
        );
        return $allUsers;
    }

    public function jsonSerialize(): array
    {
        return [
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'firstLoginDate' => $this->getFirstLoginDate()->format('Y-m-d H:i:s'),
            'lastLoginDate' => $this->getLastLoginDate()->format('Y-m-d H:i:s')
        ];
    }
}
