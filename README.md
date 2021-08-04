# Laravel 8 Xignite 具象狀態傳輸應用程式介面用戶端

Xignite 市場資料雲端平臺是一個雲端市場資料發送解決方案，能夠協助交易所和金融資料供應商從亞馬遜雲端運算服務（AWS）公共雲端透過大規模可擴充 API 來發送資料。該解決方案可讓市場資料一直儲存在雲端，而買方可僅在需要時或按照需要來購買。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/xignite/global_quotes/exchanges/list` 來進行 Xignite 支援行情價格的全球國際證券交易所取得。
- 你可以經由 `/xignite/global_quotes/global_delayed_quote/{股票代號}` 來進行延遲的特定股票行情價格。

----

## 畫面截圖
![](https://i.imgur.com/7nSA0mc.png)
> 取得一個或多個支援行情價格的全球國際證券交易所

![](https://i.imgur.com/1X70asq.png)
> 取得延遲的特定股票行情價格
