<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\Ticket\Container as TicketContainer;
use Zend\Json\Json;
use Zend\Http\Client;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Index Controller
 *
 * @author balri
 */
class IndexController extends AbstractActionController {

    /* @var $ticketContainer TicketContainer */
    protected $ticketContainer;
    
    /**
     * Get tickets
     * 
     * @return array
     */
    protected function loadTickets() {
        $url = 'http://localhost:8080';
        $config = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
        );
        $client = new Client($url, $config);
        $response = $client->send();

        if ($response->getStatusCode() == Response::STATUS_CODE_200) {
            $results = Json::decode($response->getBody());
            $this->ticketContainer = new TicketContainer;

            if ($results && property_exists($results, 'result')) {
                $this->ticketContainer->setTickets($results->result);
            }
        }
    }

    /**
     * Index action
     *
     * @return ViewModel
     */
    public function indexAction() {
        $this->loadTickets();
        
        return new ViewModel(array(
            'tickets' => $this->ticketContainer->getTickets(),
        ));
    }

    /**
     * View ticket
     */
    public function viewAction() {
        $this->loadTickets();
        
        return new ViewModel(array(
            'ticket' => $this->ticketContainer->getTicket($this->params('key')),
        ));
    }

    /**
     * View game
     *
     * @return ViewModel
     */
    public function viewGameAction() {
        $this->loadTickets();
        $ticket = $this->ticketContainer->getTicket($this->params('key'));

        return new ViewModel(array(
            'ticket' => $ticket,
            'game' => $ticket->getGame($this->params('key2')),
        ));
    }

    /**
     * View offer
     * 
     * @return ViewModel
     */
    public function viewOfferAction() {
        $this->loadTickets();
        $ticket = $this->ticketContainer->getTicket($this->params('key'));
        $game = $ticket->getGame($this->params('key2'));

        return new ViewModel(array(
            'ticket' => $ticket,
            'game' => $game,
            'offer' => $game->getOffer($this->params('key3')),
        ));
    }

}
