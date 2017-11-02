<?php namespace ewma\access;

class Permissions
{
    public static function updatePaths($permission)
    {
        $tree = \ewma\Data\Tree::get(
            \ewma\access\models\Permission::where('module_namespace', $permission->module_namespace)
        );

        self::updatePathsRecursion($tree, $permission);
    }

    private static function updatePathsRecursion(\ewma\Data\Tree $tree, $node)
    {
        $branch = $tree->getBranch($node);
        $segments = \ewma\Data\Table\Transformer::getCellsById($branch, 'path_segment');
        array_shift($segments);
        $path = a2p($segments);

        $node->path = $path;
        $node->save();

        $subnodes = $tree->getSubnodes($node->id);
        foreach ($subnodes as $subnode) {
            self::updatePathsRecursion($tree, $subnode);
        }
    }

    public static function delete($node)
    {
        $deletedPermissionsIds = \ewma\Data\Tree::delete($node);

        \ewma\access\models\GroupPermission::whereIn('permission_id', $deletedPermissionsIds)->delete();
        \ewma\access\models\UserPermission::whereIn('permission_id', $deletedPermissionsIds)->delete();

        return $deletedPermissionsIds;
    }
}
