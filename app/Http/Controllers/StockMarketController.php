<?php

namespace App\Http\Controllers;

use App\Services\XigniteService;
use Carbon\Carbon;

class StockMarketController extends Controller
{
    private $xigniteService;

    /**
     * Instantiate a new StockMarketController instance.
     *
     * @param XigniteService $xigniteService
     *
     * @return Response
     */
    public function __construct(XigniteService $xigniteService)
    {
        $this->xigniteService = $xigniteService;
    }

    /**
     * Get global quotes exchanges.
     *
     * @return Response
     */
    public function getGlobalQuotesExchanges()
    {
        $exchangesAry = $this->xigniteService->makeHttpRequest(config('xignite.base_url.global_quotes'), 'ListExchanges', [
        ]);
        if ($exchangesAry['Outcome'] == 'Success') {
            foreach ($exchangesAry['ExchangeDescriptions'] as $valueAry) {
                echo '交易所：' . $valueAry['Market'] . '；' . '市場辨識碼：' . $valueAry['MarketIdentificationCode'] . PHP_EOL;
            }
        }
    }

    /**
     * Get global delayed quote.
     *
     * @param string $identifier Identifier
     *
     * @return Response
     */
    public function getGlobalDelayedQuote($identifier)
    {
        $quoteAry = $this->xigniteService->makeHttpRequest(config('xignite.base_url.global_quotes'), 'GetGlobalDelayedQuote', [
            'IdentifierType' => 'Symbol',
            'Identifier'     => $identifier,
        ]);
        if ($quoteAry['Outcome'] == 'Success') {
            echo '股票代號：' . $quoteAry['Identifier'] . PHP_EOL;
            echo '延遲秒數：' . $quoteAry['Delay'] . PHP_EOL;
            echo '是否交易停止：' . ($quoteAry['TradingHalted'] ? '是' : '否') . PHP_EOL;
            echo '52 周最低價：' . $quoteAry['Low52Weeks'] . PHP_EOL;
            echo '52 周最高價：' . $quoteAry['High52Weeks'] . PHP_EOL;
            echo '賣出價：' . $quoteAry['Ask'] . PHP_EOL;
            echo '賣出價日期：' . Carbon::parse($quoteAry['AskDate'])->setTimezone('Asia/Taipei')->format('Y-m-d') . PHP_EOL;
            echo '賣出價時間：' . $quoteAry['AskTime'] . PHP_EOL;
            echo '買入價：' . $quoteAry['Bid'] . PHP_EOL;
            echo '買入價日期：' . Carbon::parse($quoteAry['BidDate'])->setTimezone('Asia/Taipei')->format('Y-m-d') . PHP_EOL;
            echo '買入價時間：' . $quoteAry['BidTime'] . PHP_EOL;
            echo '開盤價：' . $quoteAry['Open'] . PHP_EOL;
            echo '最高價：' . $quoteAry['High'] . PHP_EOL;
            echo '最低價：' . $quoteAry['Low'] . PHP_EOL;
            echo '收盤價：' . $quoteAry['Close'] . PHP_EOL;
        }
    }

    /**
     * Get intraday.
     *
     * @return Response
     */
    public function getIntraday()
    {

    }

    /**
     * Get tickers.
     *
     * @return Response
     */
    public function getTickers()
    {

    }

    /**
     * Get exchanges.
     *
     * @return Response
     */
    public function getExchanges()
    {
    }

    /**
     * Get currencies.
     *
     * @return Response
     */
    public function getCurrencies()
    {
    }

    /**
     * Get timezones.
     *
     * @return Response
     */
    public function getTimezones()
    {
    }
}
