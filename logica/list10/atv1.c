#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char s1[] = "lua", s2[] = "cheia";

    printf("String 1: %s\n", s1);
    printf("String 2: %s\n", s2);

    printf("\nString 2 concatenada na primeira: %s\n",  strcat(s1, s2));
    printf("String 2 após a concatenação: %s\n", s2);

    return 0;
}