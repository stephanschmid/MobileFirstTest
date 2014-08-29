<?php
namespace Edge5\BackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Created by JetBrains PhpStorm.
 * User: patrickkaufmann
 * Date: 7/11/12
 * Time: 4:30 PM
 * To change this template use File | Settings | File Templates.
 */
class AdminMenu extends \Edge5\AppBackendBundle\Menu\AdminMenu
{
    protected $translation_domain = 'Admin';
    protected $currentRoute;

    public function navbarMenu(FactoryInterface $factory, array $options)
    {
        $route = $this->container->get('request')->get('_route');
        $this->currentRoute = $this->getBackendRouteSection($route);

        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('id' => 'side-menu', 'class' => 'nav'));

        $security = $this->container->get('security.context');

        if($security->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            $isAdmin = $security->isGranted('ROLE_ADMIN');
            $isSuperAdmin = $security->isGranted('ROLE_SUPER_ADMIN');

            $level_logout = $this->addLinkRoute($menu, 'Logout', 'fos_user_security_logout')
                ->setExtra('icon', 'fa fa-power-off')
                ->setAttribute('class', 'show-mobile')
                ->setAttribute('id', '#button-exit');

            $level_header = $this->addHeader($menu, $security->getToken()->getUser().' <span class="sub">'.str_replace('ROLE_', '',implode(', ', $security->getToken()->getUser()->getRoles())).'</span>', false, 'fa fa-user', 'Edge5_AppBackendBundle_User_edit', array('pk' => 1))
                ->setAttribute('class', 'has-sub');

            $level_dashboard = $this->addLinkRoute($menu, 'Dashboard', '_dashboardIndex')
                ->setExtra('icon', 'fa fa-dashboard');

            $level_translation = $this->addLinkRoute($menu, 'Translations', 'Edge5_AppBackendBundle_Translation_list')
                ->setExtra('icon', 'fa fa-language');

            if($isSuperAdmin)
            {
                $level_fos = $this->addParentItem($menu, 'Logins', true, 'fa fa-users');

                $this->addLinkRoute($level_fos, 'Users', 'Edge5_AppBackendBundle_User_list');
                $this->addLinkRoute($level_fos, 'Groups', 'Edge5_AppBackendBundle_Group_list');
            }

        }

        return $menu;
    }
}