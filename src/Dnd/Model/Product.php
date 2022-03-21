<?php

namespace App\Dnd\Model;

class Product
{
    private $sku;

    private $title;

    private $price;

    private $currency;

    private $description;

    private $isEnabled;

    private $createdAt;

    public function __construct(array $product = [])
    {
        if(!empty($product)){
            $this->sku = $product[0];
            $this->title = $product[1];
            $this->isEnabled = $product[2];
            $this->price = $product[3];
            $this->currency = $product[4];
            $this->description = $product[5];
            $this->createdAt = new \DateTimeImmutable($product[6]);
        }
    }

    public function getSku(): ?int
    {
        return $this->sku;
    }

    public function setSku(int $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPriceWithCurrency(){
        return $this->price . $this->currency;
    }

    public function getSlugTitle(){
        //$slugger = new AsciiSlugger();

        return preg_replace('~[^_\w]+~', '-', str_replace(' ', '_',strtolower($this->title)));
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
