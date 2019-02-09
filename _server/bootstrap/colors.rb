#!/usr/bin/ruby

module Colors
    def self.black(text);          "\e[30m#{text}\e[0m"; end
    def self.red(text);            "\e[31m#{text}\e[0m"; end
    def self.green(text);          "\e[32m#{text}\e[0m"; end
    def self.brown(text);          "\e[33m#{text}\e[0m"; end
    def self.yellow(text);         "\e[33m#{text}\e[0m"; end
    def self.blue(text);           "\e[34m#{text}\e[0m"; end
    def self.magenta(text);        "\e[35m#{text}\e[0m"; end
    def self.cyan(text);           "\e[36m#{text}\e[0m"; end
    def self.white(text);           "\e[37m#{text}\e[0m"; end

    def self.bg_black(text);       "\e[40m#{text}\e[0m"; end
    def self.bg_red(text);         "\e[41m#{text}\e[0m"; end
    def self.bg_green(text);       "\e[42m#{text}\e[0m"; end
    def self.bg_brown(text);       "\e[43m#{text}\e[0m"; end
    def self.bg_yellow(text);       "\e[43m#{text}\e[0m"; end
    def self.bg_blue(text);        "\e[44m#{text}\e[0m"; end
    def self.bg_magenta(text);     "\e[45m#{text}\e[0m"; end
    def self.bg_cyan(text);        "\e[46m#{text}\e[0m"; end
    def self.bg_white(text);        "\e[47m#{text}\e[0m"; end

    def self.bold(text);           "\e[1m#{text}\e[22m"; end
    def self.italic(text);         "\e[3m#{text}\e[23m"; end
    def self.underline(text);      "\e[4m#{text}\e[24m"; end
    def self.blink(text);          "\e[5m#{text}\e[25m"; end
    def self.reverse_color(text);  "\e[7m#{text}\e[27m"; end
    def self.reset;                "\e[0";               end
end