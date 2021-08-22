<!-- đơn vị so sánh nhỏ nhất 1 đồng, 1 đô la mĩ, 1 yên nhật, 1 bảng anh, 1 đô la úc  -->
<?php
    class MONEY {
        protected $moneyinput;

        public function __construct($moneyinput) {
            $this->moneyinput = $moneyinput;
        }
    }

    class VND extends MONEY {
        
        /* do la my */
        public function vndtousd() {
            return $this->moneyinput*0.000044;
        }

        /* bang anh */
        public function vndtogpb() {
            return $this->moneyinput*0.000031;
        }
        
        /* do la uc */
        public function vndtoaud() {
            return $this->moneyinput*0.000059;
        }

        /* yen nhat */
        public function vndtojpy() {
            return $this->moneyinput*0.0047;
        }
    }

    class USD extends MONEY {

        /* vnd */
        public function usdtovnd() {
            return $this->moneyinput/0.000044;
        }

        /* do la anh */
        public function usdtogpb() {
            return $this->moneyinput*0.73;
        }

        /* do la uc */
        public function usdtoaud() {
            return $this->moneyinput*1.35;
        }

        /* yen nhat */
        public function usdtojpy() {
            return $this->moneyinput*109.06;
        }
    }

    class GPB extends MONEY {
        
        /* vnd */
        public function gpbtovnd() {
            return $this->moneyinput/0.000031;
        }

        /* usd */
        public function gpbtousd() {
            return $this->moneyinput/0.73;
        }

        /* aud */
        public function gpbtoaud() {
            return $this->moneyinput*1.88;
        }

        /* jpy */
        public function gpbtojpy() {
            return $this->moneyinput*151.84;
        }

    }

    class AUD extends MONEY {

        /* vnd */
        public function audtovnd() {
            return $this->moneyinput/0.000059;
        }

        /* usd */
        public function audtousd() {
            return $this->moneyinput/1.35;
        }

        /* jpy */
        public function audtojpy() {
            return $this->moneyinput*80.72;
        }

        /* GPB */
        public function audtogpb() {
            return $this->moneyinput*0.53;
        }
    }

    class JPY extends MONEY {

        /* vnd */
        public function jpytovnd() {
            return $this->moneyinput/0.0047;
        }

        /* usd */
        public function  jpytousd() {
            return $this->moneyinput/109.06;
        }

        /* gpb */
        public function jpytogpb() {
            return $this->moneyinput/151.84;
        }

        /* aud */
        public function jpytoaud() {
            return  $this->moneyinput/80.72;
        }
    }
    
?>