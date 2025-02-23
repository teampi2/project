import * as React from 'react'
import { Input as BaseInput } from '@mui/base/Input'
import { Box, styled } from '@mui/system'
import { Button } from '@mui/material'

function OTP({
  separator,
  length,
  value,
  onChange,
}: {
  separator: React.ReactNode
  length: number
  value: string
  onChange: React.Dispatch<React.SetStateAction<string>>
}) {
  const inputRefs = React.useRef<HTMLInputElement[]>([])

  const focusInput = (targetIndex: number) => {
    inputRefs.current[targetIndex]?.focus()
  }

  const selectInput = (targetIndex: number) => {
    inputRefs.current[targetIndex]?.select()
  }

  const handleKeyDown = (
    event: React.KeyboardEvent<HTMLInputElement>,
    currentIndex: number
  ) => {
    switch (event.key) {
      case 'ArrowLeft':
        if (currentIndex > 0) {
          focusInput(currentIndex - 1)
          selectInput(currentIndex - 1)
        }
        break
      case 'ArrowRight':
        if (currentIndex < length - 1) {
          focusInput(currentIndex + 1)
          selectInput(currentIndex + 1)
        }
        break
      case 'Backspace':
        event.preventDefault()
        if (currentIndex > 0) {
          focusInput(currentIndex - 1)
          selectInput(currentIndex - 1)
        }
        onChange((prevOtp) => {
          const otpArray = prevOtp.split('')
          otpArray[currentIndex] = ''
          return otpArray.join('')
        })
        break
      case 'Delete':
        event.preventDefault()
        onChange((prevOtp) => {
          const otpArray = prevOtp.split('')
          otpArray[currentIndex] = ''
          return otpArray.join('')
        })
        break
      default:
        break
    }
  }

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    currentIndex: number
  ) => {
    const inputChar = event.target.value.slice(-1)
    onChange((prevOtp) => {
      const otpArray = prevOtp.split('')
      otpArray[currentIndex] = inputChar
      return otpArray.join('')
    })

    if (inputChar && currentIndex < length - 1) {
      focusInput(currentIndex + 1)
    }
  }

  const handlePaste = (
    event: React.ClipboardEvent<HTMLInputElement>,
    currentIndex: number
  ) => {
    event.preventDefault()
    const pasteData = event.clipboardData.getData('text').slice(0, length)

    onChange((prevOtp) => {
      const otpArray = prevOtp.split('')
      for (let i = 0; i < pasteData.length && currentIndex + i < length; i++) {
        otpArray[currentIndex + i] = pasteData[i]
      }
      return otpArray.join('')
    })

    const nextIndex = Math.min(currentIndex + pasteData.length, length - 1)
    focusInput(nextIndex)
  }

  return (
    <Box
      sx={{
        display: 'flex',
        gap: 1,
        alignItems: 'center',
      }}
    >
      {new Array(length).fill(null).map((_, index) => (
        <React.Fragment key={index}>
          <BaseInput
            slots={{ input: InputElement }}
            aria-label={`Digit ${index + 1} of OTP`}
            slotProps={{
              input: {
                ref: (ele: HTMLInputElement) =>
                  (inputRefs.current[index] = ele!),
                onKeyDown: (event: React.KeyboardEvent<HTMLInputElement>) =>
                  handleKeyDown(event, index),
                onChange: (event: React.ChangeEvent<HTMLInputElement>) =>
                  handleChange(event, index),
                onPaste: (event: React.ClipboardEvent<HTMLInputElement>) =>
                  handlePaste(event, index),
                value: value[index] ?? '',
              },
            }}
          />
          {index < length - 1 && separator}
        </React.Fragment>
      ))}
    </Box>
  )
}

export function Verification() {
  const [otp, setOtp] = React.useState('')

  return (
    <Box
      sx={{
        display: 'flex',
        flexDirection: 'column',
        gap: 2,
        justifyContent: 'center',
        alignItems: 'center',
        height: '100vh',
        color: 'green',
        fontSize: '20px',
      }}
    >
      <Box sx={{ textDecoration: 'underline' }}>
        Digite o código de verificação.
      </Box>
      <OTP
        separator={<span>-</span>}
        value={otp}
        onChange={setOtp}
        length={6}
      />
      <Button variant="contained" sx={{ marginTop: '40px' }}>
        Confirmar
      </Button>
    </Box>
  )
}

const InputElement = styled('input')({
  width: '40px',
  height: '40px',
  textAlign: 'center',
  fontSize: '18px',
  borderRadius: '10px',
  border: '2px solid green',
  outline: 'none',
  '&:focus': {
    borderColor: 'black',
  },
})
