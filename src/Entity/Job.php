<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 *
 */
class Job
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
    private $title = '';

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $description = '';

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @var string
     */
    private $wage = '000.00';

    /**
     * @ORM\OneToMany(targetEntity="Worker", mappedBy="job")
     *
     * @var Collection
     */
    private $workers;

    /**
     * Job constructor.
     */
    public function __construct()
    {
        $this->workers = new ArrayCollection();
    }

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Job
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Job
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
     * @return Job
     */
    public function setWage(string $wage)
    {
        $this->wage = $wage;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    /**
     * @param Worker $worker
     * @return Job
     */
    public function addWorker(Worker $worker): Job
    {
        $this->workers->add($worker);
        return $this;
    }

    public function removeWorker(Worker $worker): Job
    {
        $this->workers->removeElement($worker);
        return $this;

    }
}
