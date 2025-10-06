#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char str[100];
    int i, len = strlen(str);

    printf("Digite uma frase: ");
    fgets(str, sizeof(str), stdin);

    for(i = 0; i <= len; i++) {
        str[i] = toupper(str[i]);
    }

    printf("Texto digitado capitalizado: %s", str);

    return 0;
}