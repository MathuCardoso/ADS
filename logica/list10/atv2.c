#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char s1[30], s2[30], s3[60];

    printf("Digite a primeira string: ");
    fgets(s1, sizeof(s1), stdin);

    s1[strlen(s1) - 1] = ' ';

    printf("Digite a segunda string: ");
    fgets(s2, sizeof(s2), stdin);

    s2[strlen(s1)] = '\0';

    printf("String 1: %s (%d)", s1, strlen(s1) - 1);
    printf("\nString 2: %s (%d)", s2, strlen(s2));

    strcat(s1, s2);
    strcpy(s3, s1);

    printf("\nString 3 (concatenação da string 1 com a 2): %s (%d)", s3, strlen(s3));


    return 0;
}