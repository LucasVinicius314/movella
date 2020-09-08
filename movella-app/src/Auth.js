
import 'react-native-gesture-handler'
import React from 'react'
import { StatusBar } from 'expo-status-bar'
import {
  StyleSheet,
  Text,
  View,
} from 'react-native'
import { Button } from 'react-native-paper'

export default class Auth extends React.Component {
  render = () => (
    <>
      <StatusBar style="auto" />
      <View style={styles.container}>
        <Text>Auth</Text>
        <Button
          title='a'
          mode='contained'
          onPress={() => this.props.navigation.navigate('Root')}
        >Login</Button>
      </View>
    </>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
})
