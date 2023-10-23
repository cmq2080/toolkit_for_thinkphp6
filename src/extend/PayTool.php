<?php

/**
 * 该工具内应保证任何支付平台均可调用，不为某一平台专设
 */
class PayTool
{
    public static function makeTradeNo($subMchId = '')
    {
        $payHeaderNo = config('wxpay.pay_header_no', '10');
        $payHeaderNo = strtoupper($payHeaderNo);

        $mchNo = 'FFFF';
        if ($subMchId && strlen($subMchId) > 4) {
            $mchNo = substr($subMchId, -4);
        }
        $timeNo = date('YmdHis');

        $randNo = mt_rand(0, 9999);
        $randNo = str_pad($randNo, 4, '0', STR_PAD_LEFT);

        $tradeNo = $payHeaderNo . $mchNo . $timeNo . $randNo;
        return $tradeNo;
    }

    public static function makeRefundNo($tradeNo = '')
    {
        $refundHeaderNo = config('wxpay.refund_header_no', 'FF');
        $refundHeaderNo = strtoupper($refundHeaderNo);

        $mchNo = 'FFFF';
        if ($tradeNo || strlen($tradeNo) >= 7) {
            $mchNo = substr($tradeNo, 2, 4);
        }
        $timeNo = date('YmdHis');

        $randNo = mt_rand(0, 9999);
        $randNo = str_pad($randNo, 4, '0', STR_PAD_LEFT);

        $refundNo = $refundHeaderNo . $mchNo . $timeNo . $randNo;
        return $refundNo;
    }
}
