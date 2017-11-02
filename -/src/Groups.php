<?php namespace ewma\access;

class Groups
{
    public static function createSystemGroups()
    {
        if (!\ewma\access\models\Group::where('system', true)->where('system_type', 'REGISTERED')->first()) {
            \ewma\access\models\Group::create([
                                                  'system'      => true,
                                                  'system_type' => 'REGISTERED',
                                                  'name'        => 'Зарегистрированные пользователи'
                                              ]);
        }
    }

    public static function create()
    {
        return \ewma\access\models\Group::create([]);
    }

    public static function delete(\ewma\access\models\Group $group)
    {
        $group->permissions()->detach();
        $group->delete();
    }

    // todo модуль не нужен
    public static function togglePermissionLink(
        \ewma\Modules\Module $module,
        \ewma\access\models\Group $group,
        \ewma\access\models\Permission $permission
    ) {
        if ($group && $module && $permission) {
            $link = $group->permissions()->where('id', $permission->id)->first();

            if ($link) {
                $group->permissions()->detach([$permission->id]);
            } else {
                $group->permissions()->detach([$permission->id]);
                $group->permissions()->attach([$permission->id]);
            }
        }
    }
}
