#include <iostream>

using namespace std;
int main(int argc, char *argv[]) {
	freopen("daxue.txt","r",stdin);
	freopen("daxue2.json","w",stdout);
	char c[100];
	cout<<"[";
	int i=0;
	while(cin>>c) {
		cout<<"\""<<c<<"\","<<endl;
	}
}