<?php

/**
 * Factory Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Ticket;

use Exception;
use Zend\Filter\Word\UnderscoreToCamelCase;

/**
 * Factory
 *
 * @author balri
 */
class Factory {

    /**
     * Get instance of ticket
     *
     * @param object $ticket ticket
     *
     * @return Application\Model\Ticket\AbstractTicket
     * @throws Exception
     */
    public static function getInstance($ticket) {
        if (!is_object($ticket) || !property_exists($ticket, 'type')) {
            throw new Exception("Ticket is not an object or does not contain type");
        }

        $filter = new UnderscoreToCamelCase;
        $klass = __NAMESPACE__ . '\\' . $filter->filter($ticket->type);

        if (class_exists($klass)) {
            return new $klass($ticket);
        } else {
            throw new Exception(sprintf("Unknown ticket type '%s' encountered",
                        $ticket->type));
        }
    }
}

