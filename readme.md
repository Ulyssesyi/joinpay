# 汇聚支付接口-php版本
本项目基于汇聚文档编写, 使用时请遵守汇聚的要求和限制

## 进度
- 2020.08.21  
支付接口完成,进件接口有时间再说

## 示例
### 1-支付
```php
// 支付接口
$res = (new \joinpay\request\UniPay())->setP1MerchantNo('xxxx')->setP2OrderNo('xxxx')->setP3Amount(1)->exec();
// 订单查询接口
$res = (new \joinpay\request\QueryOrder())->setP1MerchantNo('xxxx')->setP2OrderNo('xxxx')->setP3Amount(1)->exec();
```
返回值是Response实例，里面有三个值， result、msg、data，result为true代表请求成功，false为请求失败。msg为失败时的错误提示。成功时如果有额外参数返回，会在data中返回。支付接口data有payInfo和orderNo两个值，二维码支付时payInfo是图片信息，js支付时是支付参数。查询接口有status和amount两个值，status，-1-失败，0-待支付，1-支付成功，2-支付取消
