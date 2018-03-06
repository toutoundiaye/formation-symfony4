<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkerRepository")
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $lastName = '';

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $firstName = '';

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $jobTitle = '';

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     * @var string
     */
    private $workingTime = 0;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @var string
     */
    private $wage = 0;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Worker
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Worker
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     * @return Worker
     */
    public function setJobTitle(string $jobTitle)
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkingTime(): string
    {
        return $this->workingTime;
    }

    /**
     * @param string $workingTime
     * @return Worker
     */
    public function setWorkingTime(string $workingTime)
    {
        $this->workingTime = $workingTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getWage(): string
    {
        return $this->wage;
    }

    /**
     * @param string $wage
     * @return Worker
     */
    public function setWage(string $wage)
    {
        $this->wage = $wage;
        return $this;
    }


}
