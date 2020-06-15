<?php
$arr = [
  'first','second','three','four','five',
];
echo current($arr).'<br>';//读取数组的值
echo key($arr).'<br>';//读取数组的键

next($arr).'<br>';//向后移动一下  
prev($arr).'<br>';//向前移动一下
end($arr).'<br>';//移至末尾处
reset($arr).'<br>';//移至开始处
echo current($arr).'<br>';//读取数组的值
echo key($arr).'<br>';//读取数组的键


// array_combine()	生成一个数组,用一个数组的值作为键名,另一个数组值作为值	
// range()	创建并返回一个包含指定范围的元素的数组。	
// compact()	创建一个由参数所带变量组成的数组	
// array_fill()	用给定的值生成数组	
// array_chunk()	把一个数组分割为新的数组块	
// array_merge()	把两个或多个数组合并为一个数组	
// array_slice()	在数组中根据条件取出一段值，并返回	
// array_diff()	返回两个数组的差集数组	
// array_search()	在数组中搜索给定的值，如果成功则返回相应的键名	
// array_splice()	把数组中的一部分去掉并用其它值取代	
// array_sum()	计算数组中所有值的和	
// in_array()	检查数组中是否存在某个值	
// array_key_exists()	检查给定的键名或索引是否存在于数组中	
// shuffle()	将数组打乱,保留键值	
// count()	计算数组中的单元数目或对象中的属性个数	
// array_flip()	返回一个键值反转后的数组	
// array_keys()	返回数组所有的键,组成一个数组	
// array_values()	返回数组中所有值，组成一个数组	
// array_reverse()	返回一个元素顺序相反的数组	
// array_count_values()	统计数组中所有的值出现的次数	
// array_rand()	从数组中随机抽取一个或多个元素,注意是键名	
// array_unique()	删除重复值，返回剩余数组	
// sort()	按升序对给定数组的值排序,不保留键名	
// rsort()	对数组逆向排序,不保留键名	
// asort()	对数组排序,保持索引关系	
// arsort()	对数组逆向排序,保持索引关系	
// ksort()	按键名对数组排序	
// krsort()	将数组按照键逆向排序	
// natsort()	用自然顺序算法对数组中的元素排序	
// natcasesort()	自然排序,不区分大小写	
// array_filter()	去掉数组中的空元素或者预定元素	
// extract	将键变为变量名，将值变为变量值
// ?>