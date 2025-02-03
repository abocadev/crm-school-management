<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'school_id', 'birthday', 'hometown'];

    private int $id;
    private string $name;
    private string $surname;
    private ?School $school = null;
    private \DateTime $birthday;
    private ?string $hometown = null;

    public function getId(): int
    {
        if (empty($this->id)) {
            $this->id = $this['id'];
        }

        return $this->id;
    }

    public function getName(): string
    {
        if (empty($this->name)) {
            $this->name = $this['name'];
        }

        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): string
    {
        if (empty($this->surname)) {
            $this->surname = $this['surname'];
        }

        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        $this['surname'] = $surname;

        return $this;
    }

    public function getSchool(): ?School
    {
        if (empty($this->school) && $this['school_id'] != null) {
            $this->school = School::find($this['school_id']);

        }
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;
        $this['school_id'] = empty($school) ? null : $school->getId();

        return $this;
    }

    public function getBirthday(): \DateTime
    {
        if (empty($this->birthday)) {
            $this->birthday = new \DateTime($this['birthday']);
        }

        return $this->birthday;
    }

    public function setBirthday(\DateTime $birthday): self
    {
        $this->birthday = $birthday;
        $this['birthday'] = $birthday;

        return $this;
    }

    public function getHometown(): ?string
    {
        if (empty($this->hometown)) {
            $this->hometown = $this['hometown'];
        }
        return $this->hometown;
    }

    public function setHometown(?string $hometown): self
    {
        $this->hometown = $hometown;
        $this['hometown'] = $hometown;

        return $this;
    }
}
