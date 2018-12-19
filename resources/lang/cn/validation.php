<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '字段 :attribute 必须是 accepted.',
    'active_url'           => '字段 :attribute 不是有效的 URL.',
    'after'                => '字段 :attribute 必须是 :date 之后的日期.',
    'after_or_equal'       => '字段 :attribute 必须是 :date 之后或相同的日期.',
    'alpha'                => '字段 :attribute 只能包括字母.',
    'alpha_dash'           => '字段 :attribute 只能包括字母, 数字, 和下划线.',
    'alpha_num'            => '字段 :attribute 只能包括字母和数字.',
    'array'                => '字段 :attribute 必须是数组.',
    'before'               => '字段 :attribute 必须是 :date 之前的日期.',
    'before_or_equal'      => '字段 :attribute 必须是 :date 之前或相同的日期.',
    'between'              => [
        'numeric' => '数字 :attribute 必须介于 :min 至 :max 间.',
        'file'    => '文件 :attribute 的大小必须介于 :min KB 至 :max KB 之间.',
        'string'  => '字符串 :attribute 的长度必须介于 :min 至 :max 之间.',
        'array'   => '数组 :attribute 的元素个数必须介于 :min 个至 :max 个之间.',
    ],
    'boolean'              => '字段 :attribute 必须是 true 或 false.',
    'confirmed'            => '字段 :attribute 必须有对应的confirmation字段.',
    'date'                 => '字段 :attribute 不是合法的日期.',
    'date_format'          => '字段 :attribute 不符合格式 :format.',
    'different'            => '字段 :attribute 和字段 :other 必须是不相等的.',
    'digits'               => '字段 :attribute 必须是 :digits 位数字.',
    'digits_between'       => '字段 :attribute 必须是 between :min and :max digits.',
    'dimensions'           => '图片 :attribute 不是合法的宽高比.',
    'distinct'             => '字段 :attribute 能有重复值.',
    'email'                => '字段 :attribute 不是合法的 Email.',
    'exists'               => '字段 :attribute 在数据库中不合法.',
    'file'                 => '字段 :attribute 必须是上传文件.',
    'filled'               => '字段 :attribute field 值不能为空.',
    'gt'                   => [
        'numeric' => '数字 :attribute 必须大于 :value.',
        'file'    => '文件 :attribute 的大小必须大于 :value KB.',
        'string'  => '字符串 :attribute 的长度必须大于 :value.',
        'array'   => '数组 :attribute 的元素个数必须大于 :value 个.',
    ],
    'gte'                  => [
        'numeric' => '数字 :attribute 必须大于或等于 :value.',
        'file'    => '文件 :attribute 的大小必须大于或等于 :value KB.',
        'string'  => '字符串 :attribute 的长度必须大于或等于 :value.',
        'array'   => '数组 :attribute 的元素个数必须大于或等于 :value 个.',
    ],
    'image'                => '字段 :attribute 必须是图片.',
    'in'                   => '字段 :attribute 不合法.',
    'in_array'             => '字段 :attribute 必须是 :other 中的值.',
    'integer'              => '字段 :attribute 必须是整型.',
    'ip'                   => '字段 :attribute 必须是IP地址.',
    'ipv4'                 => '字段 :attribute 必须是IPv4地址.',
    'ipv6'                 => '字段 :attribute 必须是IPv6地址.',
    'json'                 => '字段 :attribute 必须是JSON.',
    'lt'                   => [
        'numeric' => '数字 :attribute 必须小于 :value.',
        'file'    => '文件 :attribute 的大小必须小于 :value KB.',
        'string'  => '字符串 :attribute 的长度必须小于 :value.',
        'array'   => '数组 :attribute 的元素个数必须小于 :value 个.',
    ],
    'lte'                  => [
        'numeric' => '数字 :attribute 必须是 less than or equal :value.',
        'file'    => '文件 :attribute 必须是 less than or equal :value kilobytes.',
        'string'  => '字符串 :attribute 必须是 less than or equal :value characters.',
        'array'   => '数组 :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => '数字 :attribute may not be greater than :max.',
        'file'    => '文件 :attribute may not be greater than :max kilobytes.',
        'string'  => '字符串 :attribute may not be greater than :max characters.',
        'array'   => '数组 :attribute may not have more than :max items.',
    ],
    'mimes'                => '文件 :attribute 的标识必须是 :values.',
    'mimetypes'            => '文件 :attribute 的扩展名必须是 :values.',
    'min'                  => [
        'numeric' => '数字 :attribute 必须是 at least :min.',
        'file'    => '文件 :attribute 必须是 at least :min kilobytes.',
        'string'  => '字符串 :attribute 必须是 at least :min characters.',
        'array'   => '数组 :attribute 必须有 at least :min items.',
    ],
    'not_in'               => '字段 :attribute 不合法.',
    'not_regex'            => '字段 :attribute 不合法.',
    'numeric'              => '字段 :attribute 必须是数字.',
    'present'              => '字段 :attribute 必须是 present.',
    'regex'                => '字段 :attribute 不合法.',
    'required'             => '字段 :attribute 必须存在.',
    'required_if'          => '字段 :attribute field is required when :other is :value.',
    'required_unless'      => '字段 :attribute field is required unless :other is in :values.',
    'required_with'        => '字段 :attribute field is required when :values is present.',
    'required_with_all'    => '字段 :attribute field is required when :values is present.',
    'required_without'     => '字段 :attribute field is required when :values is not present.',
    'required_without_all' => '字段 :attribute field is required when none of :values are present.',
    'same'                 => '字段 :attribute 和 :other must match.',
    'size'                 => [
        'numeric' => '数字 :attribute 必须是 :size.',
        'file'    => '文件 :attribute 必须是 :size kilobytes.',
        'string'  => '字符串 :attribute 必须是 :size characters.',
        'array'   => '数组 :attribute must contain :size items.',
    ],
    'string'               => '字段 :attribute 不是合法的字符串.',
    'timezone'             => '字段 :attribute 不是合法的时区.',
    'unique'               => '字段 :attribute 已存在.',
    'uploaded'             => '字段 :attribute 上传失败.',
    'url'                  => '字段 :attribute 不是合法的 URL.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
