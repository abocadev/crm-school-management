<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'direction', 'logo', 'email', 'phone', 'website'];
    private int $id;
    private string $name;
    private string $direction;
    private ?string $logo = null;
    private ?string $email = null;
    private ?string $phone = null;
    private ?string $website = null;
    private ?Collection $students = null;

    public function getId(): int

    {
        if (empty($this->id)) {
            $this->id = $this['id'];
        }

        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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
        $this['name'] = $name;

        return $this;
    }

    public function getDirection(): string
    {
        if (empty($this->direction)) {
            $this->direction = $this['direction'];
        }
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        $this['direction'] = $direction;

        return $this;
    }

    public function getLogo(): ?string
    {
        if (empty($this->logo)) {
            $this->logo = $this['logo'];
        }
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        $this['logo'] = $logo;

        return $this;
    }

    public function getEmail(): ?string
    {
        if (empty($this->email)) {
            $this->email = $this['email'];
        }

        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this['email'] = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        if (empty($this->phone)) {
            $this->phone = $this['phone'];
        }

        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        $this['phone'] = $phone;

        return $this;
    }

    public function getWebsite(): ?string
    {
        if (empty($this->website)) {
            $this->website = $this['website'];
        }

        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        $this['website'] = $website;

        return $this;
    }

    public function getStudents(): ?Collection
    {
        if (empty($this->students)) {
            $students = $this->hasMany(Student::class)->getResults();
            if (!empty($students)) {
                $this->students = $students;
            }
        }

        return $this->students;
    }
}
