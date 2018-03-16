<?php

namespace App\Service;

use App\Entity\Worker;

class CongeesPayes
{
    const CONGEES_ANNUELS = 25;
    const ANNEES = 365;

    public function calculCongees(Worker $worker)
    {
        $startDate = $worker->getStartDate();
        $curYear = date('Y');
        $endDate = "30-05-$curYear";
        $WorkingPeriod = $this->dateDifference($startDate, $endDate);
        $nbreOfWorkingPeriod = $WorkingPeriod[0]*365 + $WorkingPeriod[1]*30 + $WorkingPeriod[2];
        $nbreOfCongeesPayes = (self::CONGEES_ANNUELS * $nbreOfWorkingPeriod)/self::ANNEES;
        return $nbreOfCongeesPayes;
    }

    public function dateDifference($startDate, $endDate)
        {
            $startDate = strtotime($startDate);
            $endDate = strtotime($endDate);
            if ($startDate === false || $startDate < 0 || $endDate === false || $endDate < 0 || $startDate > $endDate)
                return false;

            $years = date('Y', $endDate) - date('Y', $startDate);

            $endMonth = date('m', $endDate);
            $startMonth = date('m', $startDate);

            // Calculate months
            $months = $endMonth - $startMonth;
            if ($months <= 0)  {
                $months += 12;
                $years--;
            }
            if ($years < 0)
                return false;

            // Calculate the days
                        $offsets = array();
                        if ($years > 0)
                            $offsets[] = $years . (($years == 1) ? ' year' : ' years');
                        if ($months > 0)
                            $offsets[] = $months . (($months == 1) ? ' month' : ' months');
                        $offsets = count($offsets) > 0 ? '+' . implode(' ', $offsets) : 'now';

                        $days = $endDate - strtotime($offsets, $startDate);
                        $days = date('z', $days);

            return array($years, $months, $days);
        }

}
