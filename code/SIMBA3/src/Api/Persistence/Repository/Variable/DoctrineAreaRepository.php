<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Locale\Entity\Locale;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;

class DoctrineAreaRepository extends EntityRepository implements AreaRepository
{
    private const TYPE_AREA_FIELD = "typeArea";
    private const LOCALE_ID_FIELD = "locale";

    public function getAllAreaByTypeArea(string $locale, int $typeAreaId): array
    {
        return $this->findBy([
            self::LOCALE_ID_FIELD => $locale,
            self::TYPE_AREA_FIELD => $typeAreaId,
        ]);
    }

    public function getAreasByFilter(string $locale, array $areaUniqueIds): array
    {
        $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a ';
        $dql .= ' WHERE a.locale = ' . $locale;
        $dql .= ' AND ' . implode(' OR ', array_map(function($area) {
                return '(a.typeArea = ' . $area['typeAreaId'] . " AND a.id = " . $area["areaId"] . ")";
            }, $areaUniqueIds));
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}