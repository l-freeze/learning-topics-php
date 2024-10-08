### 概要

クリーンアーキテクチャーで共通処理を取り入れたい場合のサンプル

1. 固有アプリケーションが共通処理を呼び出して利用している
1. 固有アプリケーションの処理をを共通処理アプリケーションに委譲している

### ディレクトリ構成

- Commono
    - どのアプリケーションからも呼び出される共通処理を配置している
- Omikuji
    - おみくじアプリケーション

```bash
packages/
├── Common
│   └── Application
│       └── Retryer
│           ├── Input.php
│           ├── Interactor.php
│           └── Output.php
└── Omikuji
    ├── Application
    │   └── Pick
    │       ├── Input.php
    │       ├── Interactor.php
    │       └── Output.php
    └── Domain
        ├── Entity
        │   └── Fortune.php
        ├── Exception
        │   ├── EvenSecondException.php
        │   └── NotEnoughMoneyException.php
        └── Value
            ├── DonationAmount.php
            └── FortuneType.php
```