<?php
public function getAllModulex(): array

public function getModulexById(int $id): ?Modulex

public function getModulesByCategorie(int $id_cat): array

public function addModulex(Modulex $module): bool

public function deleteModulex(int $id): bool

public function updateModulex(Modulex $module): bool
