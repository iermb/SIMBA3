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

    public function getAllAreaByTypeArea_old(string $locale, int $typeAreaId): array
    {
        $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a ';
        $dql .= ' INNER JOIN SIMBA3\Component\Domain\Variable\Entity\TypeArea t ON t.id=a.type_id';
        $dql .= ' WHERE t.locale = "' . $locale.'" AND t.type_area_id = '.$typeAreaId;
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    public function getAllAreaByTypeArea(string $locale, int $typeAreaId): array
    {
        /*
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->addSelect('a');
        $qb->from('SIMBA3\Component\Domain\Variable\Entity\Area','a');
        $qb->innerJoin('SIMBA3\Component\Domain\Variable\Entity\TypeArea', 't');
        $qb->where('t.id=a.type_id');
        $qb->andWhere('t.locale = :locale', $locale);
        $qb->setParameter('locale', $locale );
        $qb->andWhere('t.type_area_id = :type_area_id');
        $qb->setParameter('type_area_id', $typeAreaId);
        $query = $qb->getQuery();
        return $query->getResult();
        */

        /*
          $em = $this->getEntityManager();
          $qb = $em->createQueryBuilder();
          $qb->select('a');
          $qb->from('SIMBA3\Component\Domain\Variable\Entity\Area','a');
          $qb->innerJoin('a.SIMBA3\Component\Domain\Variable\Entity\TypeArea', 't');
          $qb->where('t.locale = :locale', $locale);
          $qb->setParameter('locale', $locale );
          $qb->andWhere('t.type_area_id = :type_area_id');
          $qb->setParameter('type_area_id', $typeAreaId);
          $query = $qb->getQuery();
          return $query->getResult();
          */


            /*
            $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a ';
            $dql .= ' INNER JOIN SIMBA3\Component\Domain\Variable\Entity\TypeArea t ON t.id=a.type_id';
            $dql .= ' WHERE t.locale = "' . $locale.'" AND t.type_area_id = '.$typeAreaId;
            $query = $this->getEntityManager()->createQuery($dql);
            return $query->getResult();
            */

        /*
        $em = $this->getEntityManager();
        return $em->createQuery('SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a 
            JOIN SIMBA3\Component\Domain\Variable\Entity\TypeArea t
            WHERE t.locale = :locale AND t.type_area_id = :typeAreaId')
            ->setParameter('locale', $locale)->setParameter('typeAreaId', $typeAreaId)->getResult();
        */

        $dql = "SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a JOIN a.typeArea t";
        $dql .= " WHERE t.locale = '" . $locale . "' AND t.typeAreaId = " . $typeAreaId;
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
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